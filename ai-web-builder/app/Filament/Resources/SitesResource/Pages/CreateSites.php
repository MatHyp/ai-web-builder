<?php

namespace App\Filament\Resources\SitesResource\Pages;

use App\Filament\Resources\SitesResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\View; 

use App\Services\SiteGeneratorService;
use App\AI\Services\OpenRouterAPI; 
use App\AI\Prompts\AIPrompt;

class CreateSites extends CreateRecord
{
    protected static string $resource = SitesResource::class;
    protected array $generatedSections = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        try {
            $service = new SiteGeneratorService(new OpenRouterAPI());
            $generated = $service->generate($data['company_description']);

            $this->generatedSections = $generated['sections'];
                
            $data['theme'] = $generated['theme'];
            $data['user_id'] = Auth::id();
            $data['uuid'] = (string) Str::uuid();
        } 
        catch (\Exception $e) {
                Notification::make()->title('Błąd')->body($e->getMessage())->danger()->send();
                $this->halt();
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $site = $this->record; 

        $allowedTypes = ['hero', 'about', 'features', 'services', 'pricing', 'testimonials', 'contact'];

        foreach ($this->generatedSections as $section) {
            if (!isset($section['type']) || !isset($section['data'])) {
                continue;
            }

            if (!in_array($section['type'], $allowedTypes)) {
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
            Section::make('Szczegóły Generowania')
                ->description('Wprowadź dane firmy, a sztuczna inteligencja przygotuje propozycję strony.')
                ->icon('heroicon-o-sparkles')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Nazwa firmy')
                        ->required()
                        ->placeholder('Np. Moja Kawiarnia'),
                        
                    Forms\Components\Textarea::make('company_description')
                        ->label('Opis firmy (dla AI)')
                        ->helperText('Opisz czym zajmuje się firma...')
                        ->required()
                        ->rows(5)
                        ->autosize(),
                ])
                ->columns(1),

                View::make('filament.components.ai-loader'), 
        ]);
}
}