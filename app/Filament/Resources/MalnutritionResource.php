<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MalnutritionResource\Pages;
use App\Models\Malnutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MalnutritionResource extends Resource
{
    protected static ?string $model = Malnutrition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('age_or_months'),
                Forms\Components\TextInput::make('associated_health_center')
                    ->required(),
                Forms\Components\Select::make('district_id')
                    ->relationship('district', 'name'),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name'),
                Forms\Components\Select::make('cell_id')
                    ->relationship('cell', 'name'),
                Forms\Components\Select::make('village_id')
                    ->relationship('village', 'name'),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('home_phone_number')
                    ->tel(),
                Forms\Components\TextInput::make('entry_muac')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_muac')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_nutrition_status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age_or_months')
                    ->searchable(),
                Tables\Columns\TextColumn::make('associated_health_center')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sector.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cell.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('village.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('entry_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_nutrition_status')
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMalnutritions::route('/'),
            'create' => Pages\CreateMalnutrition::route('/create'),
            'view' => Pages\ViewMalnutrition::route('/{record}'),
            'edit' => Pages\EditMalnutrition::route('/{record}/edit'),
        ];
    }
}
