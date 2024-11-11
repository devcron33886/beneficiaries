<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreditTopUpResource\Pages;
use App\Models\CreditTopUp;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
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

class CreditTopUpResource extends Resource
{
    protected static ?string $model = CreditTopUp::class;

    protected static ?string $slug = 'credit-top-ups';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Micro Credit Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ])->columns(1);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vsla.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')->money('RWF'),

                TextColumn::make('done_at')
                    ->label('Done Date')
                    ->date(),
            ])
            ->filters([
                TrashedFilter::make()->native(false)->preload(true)->searchable(),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()->slideOver()->label('Edit Top Up'),
                    DeleteAction::make()->slideOver()->label('Delete Top Up'),
                    RestoreAction::make()->slideOver(),
                    ForceDeleteAction::make(),
                ]),

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
            'index' => Pages\ManageCreditTopUp::route('/'),
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
        return parent::getGlobalSearchEloquentQuery()->with(['vsla']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['vsla.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->vsla) {
            $details['Vsla'] = $record->vsla->name;
        }

        return $details;
    }
}
