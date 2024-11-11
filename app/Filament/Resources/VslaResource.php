<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VslaResource\Pages;
use App\Filament\Resources\VslaResource\RelationManagers;
use App\Models\Vsla;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VslaResource extends Resource
{
    protected static ?string $model = Vsla::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Micro Credit Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('code')
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('representative_name')
                        ->required(),
                    Forms\Components\TextInput::make('representative_id')
                        ->required(),
                    Forms\Components\TextInput::make('representative_phone'),
                    Forms\Components\TextInput::make('sector'),
                    Forms\Components\TextInput::make('cell'),
                    Forms\Components\TextInput::make('village'),
                    Forms\Components\TextInput::make('entrance_year')
                        ->required(),
                    Forms\Components\TextInput::make('mou_sign_date'),
                ])->columns(2)


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('representative_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('representative_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('representative_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sector')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cell')
                    ->searchable(),
                Tables\Columns\TextColumn::make('village')
                    ->searchable(),
                Tables\Columns\TextColumn::make('entrance_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mou_sign_date')
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
            RelationManagers\TopUpsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVslas::route('/'),
            'create' => Pages\CreateVsla::route('/create'),
            'view' => Pages\ViewVsla::route('/{record}'),
            'edit' => Pages\EditVsla::route('/{record}/edit'),
        ];
    }
}
