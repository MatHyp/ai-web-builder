<?php

namespace App\Filament\Resources\SitesResource\Pages;

use App\Filament\Resources\SitesResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

use App\AI\Services\OpenRouterAPI; 
use App\AI\Prompts\AIPrompt;

class CreateSites extends CreateRecord
{
    protected static string $resource = SitesResource::class;
    protected array $generatedSections = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $prompt = AIPrompt::make($data['company_description']);
        $api = new OpenRouterAPI();
        
        try {
            $apiResponse = $api->apiCall($prompt);
            $content = $apiResponse['choices'][0]['message']['content'];
            
            $decodedSections = json_decode($content, true);

            if (!is_array($decodedSections)) {
                 throw new \Exception('AI zwróciło nieprawidłowy format danych.');
            }

            $this->generatedSections = $decodedSections;

        } catch (\Exception $e) {
            Notification::make()
                ->title('Błąd AI')
                ->body($e->getMessage())
                ->danger()
                ->send();
            
            $this->halt();
        }
        
        $data['user_id'] = Auth::id();
        $data['uuid'] = (string) Str::uuid();
        
        return $data;
    }

    protected function afterCreate(): void
    {
        $site = $this->record; 

        foreach ($this->generatedSections as $section) {
            if (!isset($section['type']) || !isset($section['data'])) {
                continue;
            }

            \App\Models\SiteSection::create([
                'site_id' => $site->id,
                'type' => $section['type'],
                'data' => $section['data'], 
            ]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Nazwa projektu')
                    ->required()
                    ->placeholder('Np. Moja Kawiarnia'),

                Forms\Components\Textarea::make('company_description')
                    ->label('Opis firmy (dla AI)')
                    ->helperText('Opisz czym zajmuje się firma. AI na tej podstawie wygeneruje stronę.')
                    ->required()
                    ->rows(5)
                ]);
    }
}