<?php

namespace App\Filament\Resources\SitesResource\Pages;

use App\Filament\Resources\SitesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateSites extends CreateRecord
{
    protected static string $resource = SitesResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        return $data;
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
                    ->dehydrated(false), 
                    
                ]);
    }
}
