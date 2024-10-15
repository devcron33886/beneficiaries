<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MalnutritionResource\Pages;
use App\Filament\Resources\MalnutritionResource\RelationManagers;
use App\Models\Malnutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('sector'),
                Forms\Components\TextInput::make('cell'),
                Forms\Components\TextInput::make('village'),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('home_phone_number')
                    ->tel(),
                Forms\Components\DatePicker::make('package_reception_date'),
                Forms\Components\TextInput::make('entry_muac')
                    ->numeric(),
                Forms\Components\TextInput::make('current_muac')
                    ->numeric(),
                Forms\Components\TextInput::make('current_nutrition_color_code'),
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
                Tables\Columns\TextColumn::make('sector')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cell')
                    ->searchable(),
                Tables\Columns\TextColumn::make('village')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('package_reception_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entry_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_nutrition_color_code')
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
            'index' => Pages\ManageMalnutritions::route('/'),
        ];
    }
}
