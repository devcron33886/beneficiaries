<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZamukaSupportResource\Pages;
use App\Models\ZamukaSupport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ZamukaSupportResource extends Resource
{
    protected static ?string $model = ZamukaSupport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Zamuka Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('zamuka_beneficiary_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('house')
                    ->required(),
                Forms\Components\TextInput::make('home_equipments')
                    ->required(),
                Forms\Components\TextInput::make('bicycle')
                    ->required(),
                Forms\Components\TextInput::make('cowshed')
                    ->required(),
                Forms\Components\TextInput::make('cow')
                    ->required(),
                Forms\Components\TextInput::make('goats')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('zamuka_beneficiary_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('house')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_equipments')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bicycle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cowshed')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cow')
                    ->searchable(),
                Tables\Columns\TextColumn::make('goats')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageZamukaSupports::route('/'),
        ];
    }
}
