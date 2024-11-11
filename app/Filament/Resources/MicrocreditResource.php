<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MicrocreditResource\Pages;
use App\Models\Microcredit;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MicrocreditResource extends Resource
{
    protected static ?string $model = Microcredit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Micro Credit Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Section::make()
                ->schema([
                    Forms\Components\Select::make('vsla_id')
                    ->relationship('vsla', 'name')
                    ->required(),
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('gender')
                        ->required(),
                    Forms\Components\TextInput::make('id_number'),
                    Forms\Components\TextInput::make('district')->default('Bugesera'),
                    Forms\Components\TextInput::make('sector'),
                    Forms\Components\TextInput::make('cell'),
                    Forms\Components\TextInput::make('village'),
                    Forms\Components\TextInput::make('mobile'),

            ])]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vsla.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_number')
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
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('loan_one')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('loan_two')
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
            'index' => Pages\ManageMicrocredits::route('/'),
        ];
    }
}
