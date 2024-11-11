<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolFeedingSupportResource\Pages;
use App\Models\SchoolFeedingSupport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolFeedingSupportResource extends Resource
{
    protected static ?string $model = SchoolFeedingSupport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'School Feeding Management';

    protected static ?string $recordTitleAttribute = 'support_given';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('school_feeding_id')
                    ->label('Choose Student')
                    ->relationship('schoolFeeding', 'name')
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('current_grade')
                    ->label('Current Grade')
                    ->options([
                        'S1' => 'S1',
                        'S2' => 'S2',
                        'S3' => 'S3',
                        'S4' => 'S4',
                        'S5' => 'S5',
                        'S6' => 'S6',
                        'P1' => 'P1',
                        'P2' => 'P2',
                        'P3' => 'P3',
                        'P4' => 'P4',
                        'P5' => 'P5',
                        'P6' => 'P6',
                    ])
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('academic_year')
                    ->required(),
                Forms\Components\Select::make('trimester')
                    ->options([
                        'first' => 'First Trimester',
                        'second' => 'Second Trimester',
                        'third' => 'Third Trimester',
                    ])
                    ->native(false)
                    ->searchable()
                    ->required(),
                Forms\Components\CheckboxList::make('support_given')
                    ->label('Support Received')
                    ->options([
                        'school_fees' => 'School Fees',
                        'school_materials' => 'School Materials',
                        'pads' => 'Pads',
                        'school_uniforms' => 'School Uniforms',
                        'shoes' => 'Shoes',
                        'clothes' => 'Clothes',
                    ])->columns(2),
                Forms\Components\Textarea::make('notes')
                    ->label('Notes'),

            ])->columns(1);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('schoolFeeding.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trimester')
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
                Tables\Filters\SelectFilter::make('trimester')->options([
                    'first' => 'First Trimester',
                    'second' => 'Second Trimester',
                    'third' => 'Third Trimester', ])->native(false),
                Tables\Filters\SelectFilter::make('support_given')->options([
                    'school_fees' => 'School Fees',
                    'school_materials' => 'School Materials',
                    'pads' => 'Pads',
                    'school_uniforms' => 'School Uniforms',
                    'shoes' => 'Shoes',
                    'clothes' => 'Clothes',
                ])->native(false)->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->slideOver(),
                Tables\Actions\EditAction::make()->slideOver(),
                Tables\Actions\DeleteAction::make()->slideOver(),
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
            'index' => Pages\ManageSchoolFeedingSupports::route('/'),
        ];
    }
}
