<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZamukaBeneficiaryResource\Pages;
use App\Models\ZamukaBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ZamukaBeneficiaryResource extends Resource
{
    protected static ?string $model = ZamukaBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'head_of_household_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('head_of_household_name')
                    ->required(),
                Forms\Components\TextInput::make('household_id_number'),
                Forms\Components\TextInput::make('spouse_name'),
                Forms\Components\TextInput::make('spouse_id_number'),
                Forms\Components\Select::make('district_id')
                    ->relationship('district', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('cell_id')
                    ->relationship('cell', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('village_id')
                    ->relationship('village', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\TextInput::make('house_hold_phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('family_size')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('main_source_of_income')
                    ->required(),
                Forms\Components\TextInput::make('entrance_year')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('head_of_household_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('household_id_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('spouse_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('spouse_id_number')
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
                Tables\Columns\TextColumn::make('house_hold_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('family_size')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('main_source_of_income')
                    ->searchable(),
                Tables\Columns\TextColumn::make('entrance_year')
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
            'index' => Pages\ManageZamukaBeneficiaries::route('/'),
        ];
    }
}
