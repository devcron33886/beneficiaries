<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VslaResource\Pages;
use App\Models\Vsla;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;

class VslaResource extends Resource
{
    protected static ?string $model = Vsla::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'All Vslas';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->placeholder('Enter unique code that reperesent VSLA')
                    ->required()
                    ->unique(),
                Forms\Components\TextInput::make('name')
                    ->placeholder('Enter the full name of VSLA.')
                    ->required(),
                Forms\Components\TextInput::make('representative_name')
                    ->placeholder('Enter VSLA representative name')
                    ->required(),
                Forms\Components\TextInput::make('representative_id')
                    ->label('Representative NID Number')
                    ->placeholder('Enter VSLA representative id number')
                    ->unique()
                    ->required(),
                Forms\Components\TextInput::make('representative_phone')
                    ->unique()
                    ->required(),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('cell_id')
                    ->relationship('cell', 'name')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('village_id')
                    ->relationship('village', 'name')
                    ->preload()
                    ->required()
                    ->searchable()
                    ->native(false),
                Forms\Components\TextInput::make('entrance_year')
                    ->required(),
                Forms\Components\DatePicker::make('mou_sign_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sector.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('entrance_year')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mou_sign_date')
                    ->date()
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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make()->slideOver()->label('Vsla info'),
                    Tables\Actions\EditAction::make()->slideOver()->label('Edit Vsla'),
                    Tables\Actions\DeleteAction::make()->slideOver()->label('Delete Vsla'),
                ]),

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
            'index' => Pages\ManageVslas::route('/'),
        ];
    }
}
