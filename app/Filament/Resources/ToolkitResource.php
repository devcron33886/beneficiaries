<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\ToolkitResource\Pages;
use App\Models\Toolkit;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ToolkitResource extends Resource
{
    protected static ?string $model = Toolkit::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Section::make('Add New Beneficiary')->schema([
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\Select::make('gender')
                        ->options(GenderEnum::class)
                        ->native(false)
                        ->required(),
                    Forms\Components\TextInput::make('identification_number')
                        ->label('National ID number')
                        ->required()
                        ->unique(),
                    Forms\Components\TextInput::make('phone_number')
                        ->required()
                        ->tel(),
                    Forms\Components\TextInput::make('tvet_attended')
                        ->required()
                        ->label('Atended TVET'),
                    Forms\Components\TextInput::make('option')
                        ->required()->label('Trade/Option'),
                    Forms\Components\TextInput::make('level')
                        ->required(),
                    Forms\Components\Toggle::make('toolkit_received')
                        ->default(true),
                    Forms\Components\TextInput::make('toolkit_cost')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('subsidized_percent')
                        ->required()
                        ->numeric()
                        ->label('Subsidized Percentage'),
                    Forms\Components\TextInput::make('loan_recommended')
                        ->numeric(),
                    Forms\Components\TextInput::make('total')
                        ->numeric(),
                ])->columns(2),

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
                Tables\Columns\TextColumn::make('identification_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tvet_attended')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable(),
                Tables\Columns\IconColumn::make('toolkit_received')
                    ->boolean(),
                Tables\Columns\TextColumn::make('toolkit_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subsidized_percent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('loan_recommended')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ManageToolkits::route('/'),
        ];
    }
}
