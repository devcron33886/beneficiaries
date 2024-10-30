<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MvtcBeneficiaryResource\Pages;
use App\Models\MvtcBeneficiary;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MvtcBeneficiaryResource extends Resource
{
    protected static ?string $model = MvtcBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reg_no'),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('gender')
                    ->options([
                        'MALE' => 'MALE',
                        'FEMALE' => 'FEMALE',
                    ])
                    ->native(false)
                ->required(),
                Forms\Components\TextInput::make('dob'),
                Forms\Components\TextInput::make('student_id'),
                Forms\Components\TextInput::make('student_contact'),
                Forms\Components\Select::make('trade')
                    ->options([
                        'Auto engine Repair' => 'Auto engine Repair',
                        'TAILORING' => 'TAILORING',
                        'Tailoring Nyarugenge' => 'Tailoring Nyarugenge',
                        'MULTIMEDIA' => 'MULTIMEDIA',
                        'WELDING' => 'WELDING',
                        'HAIRDRESSING' => 'HAIRDRESSING',

                    ])->native(false),
                Forms\Components\TextInput::make('resident_district'),
                Forms\Components\TextInput::make('sector'),
                Forms\Components\TextInput::make('cell'),
                Forms\Components\TextInput::make('village'),
                Forms\Components\TextInput::make('education_level'),
                Forms\Components\Select::make('scholar_type')
                ->options([
                    'FMO School feeding'=>'FMO School feeding',
                    'Private'=>'Private',
                    'NGO Scholar'=>'NGO Scholar',
                    'Full Scholarship'=>'Full Scholarship'

                ])->native(false),
                Forms\Components\TextInput::make('intake'),
                Forms\Components\TextInput::make('graduation_date'),
                Forms\Components\TextInput::make('status'),
            ]);
    }

    /**
     * @throws Exception
     */
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
                Tables\Columns\TextColumn::make('student_contact')
                    ->label('Student Contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trade')->sortable()
                    ->searchable(),


                Tables\Columns\TextColumn::make('status')
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
                SelectFilter::make('status')
                    ->options([
                        'Graduated' => 'Graduated',
                        'Dropped Out' => 'Dropped Out',
                        'In Progress' => 'In Progress',
                    ])->native(false),
                SelectFilter::make('gender')
                    ->options([
                        'MALE' => 'MALE',
                        'FEMALE' => 'FEMALE',

                    ])->native(false),
                SelectFilter::make('scholar_type')
                    ->options([
                        'FMO School feeding'=>'FMO School feeding',
                        'Private'=>'Private',
                        'NGO Scholar'=>'NGO Scholar',
                        'Full Scholarship'=>'Full Scholarship'

                    ])->native(false)
            ])
            ->actions([
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
            'index' => Pages\ManageMvtcBeneficiaries::route('/'),
        ];
    }
}
