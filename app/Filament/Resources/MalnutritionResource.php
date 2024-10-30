<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Enums\NutritionColor;
use App\Filament\Resources\MalnutritionResource\Pages;
use App\Models\Malnutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MalnutritionResource extends Resource
{
    protected static ?string $model = Malnutrition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Malnutrition Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('gender')
                    ->options(GenderEnum::class)->native(false),
                Forms\Components\TextInput::make('age_or_months'),
                Forms\Components\TextInput::make('associated_health_center')
                    ->required(),
                Forms\Components\TextInput::make('sector')
                    ->required(),
                Forms\Components\TextInput::make('cell')
                    ->required(),
                Forms\Components\TextInput::make('village')
                    ->required(),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('home_phone_number')
                    ->tel(),
                Forms\Components\DatePicker::make('package_reception_date'),
                Forms\Components\TextInput::make('entry_muac')
                    ->numeric(),
                Forms\Components\TextInput::make('current_muac')
                    ->numeric(),
                Forms\Components\Select::make('current_nutrition_color_code')->options(NutritionColor::class)->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('associated_health_center')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sector')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('current_nutrition_color_code')
                    ->badge()
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
                SelectFilter::make('gender')
                    ->options(GenderEnum::class)
                    ->native(false),
                SelectFilter::make('current_nutrition_color_code')
                    ->options(NutritionColor::class)
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver(),
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
