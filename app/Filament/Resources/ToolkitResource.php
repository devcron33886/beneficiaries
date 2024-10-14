<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolkitResource\Pages;
use App\Filament\Resources\ToolkitResource\RelationManagers;
use App\Models\Toolkit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('identification_number'),
                Forms\Components\TextInput::make('phone_number')
                    ->tel(),
                Forms\Components\TextInput::make('tvet_attended'),
                Forms\Components\TextInput::make('option'),
                Forms\Components\TextInput::make('level'),
                Forms\Components\TextInput::make('training_intake'),
                Forms\Components\DatePicker::make('reception_date'),
                Forms\Components\Toggle::make('toolkit_received'),
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
                Tables\Columns\TextColumn::make('training_intake')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reception_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('toolkit_received')
                    ->boolean(),
                Tables\Columns\TextColumn::make('toolkit_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subsidized_percent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sector')
                    ->searchable(),
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
