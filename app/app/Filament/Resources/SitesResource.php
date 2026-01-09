<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SitesResource\Pages;
use App\Filament\Resources\SitesResource\RelationManagers;
use App\Models\Sites; 
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SitesResource extends Resource
{

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Nazwa strony')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data utworzenia')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('uuid')
                    ->label('Podgląd')
                    ->formatStateUsing(fn () => 'Otwórz stronę')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('primary')
                    ->url(fn (Sites $record) => url('/preview/' . $record->uuid)) 
                    ->openUrlInNewTab(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSites::route('/'),
            'create' => Pages\CreateSites::route('/create'),
        ];
    }    
}
