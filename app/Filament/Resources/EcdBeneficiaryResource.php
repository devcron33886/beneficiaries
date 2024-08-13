<?php

namespace App\Filament\Resources;

use App\Enums\EcdGrade;
use App\Enums\GenderEnum;
use App\Filament\Resources\EcdBeneficiaryResource\Pages;
use App\Models\Cell;
use App\Models\District;
use App\Models\EcdBeneficiary;
use App\Models\Sector;
use App\Models\Village;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class EcdBeneficiaryResource extends Resource
{
    protected static ?string $model = EcdBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('grade'),
                Forms\Components\Select::make('gender')
                    ->options(GenderEnum::class)
                    ->native(false),
                Forms\Components\TextInput::make('academic_year'),
                Forms\Components\Select::make('district_id')
                    ->live()
                    ->label('District')
                    ->dehydrated(false)
                    ->options(District::pluck('name', 'id'))
                    ->native(false)
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('sector_id')
                    ->label('Sector')
                    ->options(fn (Get $get): Collection => Sector::query()
                    ->where('district_id', $get('district_id'))
                    ->pluck('name', 'id'))
                    ->live()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('cell_id')
                ->label('Cell')
                ->options(fn (Get $get): Collection => Cell::query()
                ->where('sector_id', $get('sector_id'))
                ->pluck('name', 'id'))
                ->live()
                ->native(false)
                ->required(),
                Forms\Components\Select::make('village_id')
                ->label('Village')
                ->options(fn (Get $get): Collection => Village::query()
                ->where('cell_id', $get('cell_id'))
                ->pluck('name', 'id'))
                ->native(false)
                ->live()
                ->required(),
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
                ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->sortable()
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
                SelectFilter::make('gender')
                ->options(GenderEnum::class)
                ->native(false)
                ->default(null),
                SelectFilter::make('grade')
               ->options(EcdGrade::class)
               ->native(false)
                ->searchable()
                ->default(null),
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
            'index' => Pages\ManageEcdBeneficiaries::route('/'),
        ];
    }
}
