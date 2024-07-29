<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MvtcBeneficiaryResource\Pages;
use App\Models\MvtcBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MvtcBeneficiaryResource extends Resource
{
    protected static ?string $model = MvtcBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reg_no')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender')
                    ->required(),
                Forms\Components\Select::make('district_id')
                    ->relationship('district', 'name'),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name'),
                Forms\Components\TextInput::make('student_id'),
                Forms\Components\TextInput::make('student_contact')
                    ->required(),
                Forms\Components\TextInput::make('trade')
                    ->required(),
                Forms\Components\TextInput::make('scholar_type')
                    ->required(),
                Forms\Components\TextInput::make('intake')
                    ->required(),
                Forms\Components\TextInput::make('graduation_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reg_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sector.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scholar_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('intake')
                    ->searchable(),
                Tables\Columns\TextColumn::make('graduation_date')
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
            'index' => Pages\ManageMvtcBeneficiaries::route('/'),
        ];
    }
}
