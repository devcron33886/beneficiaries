<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Enums\SchoolFeedingGrade;
use App\Enums\SchoolFeedingStatus;
use App\Filament\Resources\SchoolFeedingResource\Pages;
use App\Models\Option;
use App\Models\SchoolFeeding;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolFeedingResource extends Resource
{
    protected static ?string $model = SchoolFeeding::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('grade')
                    ->options(SchoolFeedingGrade::class)
                    ->native(false)
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('gender')
                    ->options(GenderEnum::class)
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('school')
                    ->required()
                    ->required(),
                Forms\Components\Select::make('option')->required()
                    ->options(Option::pluck('name', 'id')->toArray())
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->createOptionForm([Forms\Components\TextInput::make('name')
                        ->required()
                        ->unique(), ]),
                Forms\Components\TextInput::make('school_phone')
                    ->required()
                    ->tel(),
                Forms\Components\Select::make('district_id')
                    ->relationship('district', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('sector_id')
                    ->relationship('sector', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('cell_id')
                    ->relationship('cell', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('village_id')
                    ->relationship('village', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('father_name'),
                Forms\Components\TextInput::make('mother_name'),
                Forms\Components\TextInput::make('home_phone')
                    ->tel(),
                Forms\Components\Select::make('status')
                    ->options(SchoolFeedingStatus::class)
                    ->native(false)
                    ->required(),
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
                    ->sortable()
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('school')
                    ->searchable(),

                Tables\Columns\TextColumn::make('school_phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ManageSchoolFeedings::route('/'),
        ];
    }
}
