<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanDistributionResource\Pages;
use App\Models\CreditTopUp;
use App\Models\LoanDistribution;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanDistributionResource extends Resource
{
    protected static ?string $model = LoanDistribution::class;

    protected static ?string $slug = 'loan-distributions';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static  ?string $navigationGroup='Micro Credit Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Section::make()
                ->schema([
                    Select::make('member_id')
                        ->relationship('member', 'name')
                        ->createOptionForm([Section::make()
                            ->schema([
                            Select::make('vsla_id')
                                ->relationship('vsla', 'name')
                                ->native(false)
                                ->preload(true)
                                ->searchable()
                                ->required(),
                            TextInput::make('name')
                                ->required(),
                            Select::make('gender')
                                ->options([
                                    'male' => 'Male',
                                    'female' => 'Female',
                                ])->native(false)
                                ->required(),
                            TextInput::make('id_number')->label('National Id Number')
                                ->placeholder('Enter the national number id of member.'),
                            TextInput::make('district')->label('District')
                                ->default('Bugesera'),
                            TextInput::make('sector')->label('Sector'),
                            TextInput::make('cell')->label('cell'),
                            TextInput::make('village')->label('Village'),
                            TextInput::make('mobile'),
                            TextInput::make('loan_one')
                                ->numeric(),
                            TextInput::make('loan_two')
                                ->numeric(),
                        ])->columns(3)])
                        ->searchable()
                        ->preload()
                        ->required(),

                    TextInput::make('amount')
                        ->required()
                        ->integer(),

                    Textarea::make('notes')
                        ->required(),

                    Select::make('credit_top_up_id')
                        ->relationship('creditTopUp', 'vsla_id')
                        ->createOptionForm([
                            Section::make()->schema(
                                [
                                    Select::make('vsla_id')
                                        ->relationship('vsla', 'name')
                                        ->searchable()
                                        ->native(false)
                                        ->preload(true)
                                        ->required(),

                                    TextInput::make('amount')
                                        ->required()

                                        ->integer(),

                                    Textarea::make('notes')
                                        ->required(),

                                    DatePicker::make('done_at')

                                        ->label('Done Date'),

                                    Placeholder::make('created_at')
                                        ->label('Created Date')
                                        ->content(fn (?CreditTopUp $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                                    Placeholder::make('updated_at')
                                        ->label('Last Modified Date')
                                        ->content(fn (?CreditTopUp $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                                ]
                            )->columns(2)
                        ])
                        ->required()
                        ->native(false),

                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->content(fn (?LoanDistribution $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                    Placeholder::make('updated_at')
                        ->label('Last Modified Date')
                        ->content(fn (?LoanDistribution $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                ])->columns(2)]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')->money('RWF'),
                TextColumn::make('creditTopUp.vsla.name'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoanDistributions::route('/'),
            'create' => Pages\CreateLoanDistribution::route('/create'),
            'edit' => Pages\EditLoanDistribution::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['member']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['member.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->member) {
            $details['Member'] = $record->member->name;
        }

        return $details;
    }
}