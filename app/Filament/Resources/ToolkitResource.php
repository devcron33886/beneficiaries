<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\ToolkitResource\Pages;
use App\Models\Toolkit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ToolkitResource extends Resource
{
    protected static ?string $model = Toolkit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('gender')
                    ->options(GenderEnum::class)
                    ->native(false),
                Forms\Components\TextInput::make('identification_number')
                    ->minLength(16)
                    ->maxLength(16)
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('phone_number')
                    ->minLength(10)
                    ->maxLength(13)
                    ->tel(),
                Forms\Components\TextInput::make('tvet_attended')
                    ->required(),
                Forms\Components\TextInput::make('option')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->required(),
                Forms\Components\TextInput::make('training_intake')
                    ->required(),
                Forms\Components\DatePicker::make('reception_date'),
                Forms\Components\TextInput::make('toolkit_received'),
                Forms\Components\TextInput::make('toolkit_cost')
                    ->numeric(),
                Forms\Components\TextInput::make('subsidized_percent')
                    ->numeric(),
                Forms\Components\TextInput::make('sector'),
                Forms\Components\TextInput::make('total')
                    ->numeric(),
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
                    ->searchable(),

                Tables\Columns\TextColumn::make('tvet_attended')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('training_intake')
                    ->searchable(),
                Tables\Columns\TextColumn::make('toolkit_received')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sector')
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
            'index' => Pages\ManageToolkits::route('/'),
        ];
    }
}
