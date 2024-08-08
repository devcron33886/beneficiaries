<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EcdBeneficiaryResource\Pages;
use App\Models\EcdBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EcdBeneficiaryResource extends Resource
{
    protected static ?string $model = EcdBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('grade'),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('academic_year'),
                Forms\Components\TextInput::make('district_id')
                    ->numeric(),
                Forms\Components\TextInput::make('sector_id')
                    ->numeric(),
                Forms\Components\TextInput::make('cell_id')
                    ->numeric(),
                Forms\Components\TextInput::make('village_id')
                    ->numeric(),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('father_id_number'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('home_phone_number')
                    ->tel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sector_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cell_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('village_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_id_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_phone_number')
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
            'index' => Pages\ManageEcdBeneficiaries::route('/'),
        ];
    }
}
