<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource\RelationManagers;
use App\Models\Scholarship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScholarshipResource extends Resource
{
    protected static ?string $model = Scholarship::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('id_number'),
                Forms\Components\Select::make('district_id')
                    ->relationship('district', 'name'),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name'),
                Forms\Components\Select::make('cell_id')
                    ->relationship('cell', 'name'),
                Forms\Components\Select::make('village_id')
                    ->relationship('village', 'name'),
                Forms\Components\TextInput::make('mobile'),
                Forms\Components\TextInput::make('university_attended'),
                Forms\Components\TextInput::make('faculty'),
                Forms\Components\TextInput::make('program_duration'),
                Forms\Components\TextInput::make('budget_to_complete'),
                Forms\Components\TextInput::make('year_of_entrance'),
                Forms\Components\TextInput::make('school_contact'),
                Forms\Components\TextInput::make('status'),
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
                
                
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('university_attended')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('year_of_entrance')
                ->sortable()
                    ->searchable(),
            
                Tables\Columns\TextColumn::make('status')
               ->searchable(),
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
            'index' => Pages\ManageScholarships::route('/'),
        ];
    }
}
