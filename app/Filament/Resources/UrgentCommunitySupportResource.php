<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UrgentCommunitySupportResource\Pages;
use App\Models\UrgentCommunitySupport;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UrgentCommunitySupportResource extends Resource
{
    protected static ?string $model = UrgentCommunitySupport::class;

    protected static ?string $slug = 'urgent-community-supports';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                TextInput::make('national_id_number'),

                TextInput::make('sector'),

                TextInput::make('cell'),

                TextInput::make('village'),

                TextInput::make('phone_number')
                    ->required(),

                TextInput::make('support')
                    ->required(),

                DatePicker::make('done_at')
                    ->label('Done Date'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?UrgentCommunitySupport $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?UrgentCommunitySupport $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('national_id_number'),

                TextColumn::make('sector'),

                TextColumn::make('cell'),

                TextColumn::make('village'),

                TextColumn::make('phone_number'),

                TextColumn::make('support'),

                TextColumn::make('done_at')
                    ->label('Done Date')
                    ->date(),
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
            'index' => Pages\ListUrgentCommunitySupports::route('/'),
            'create' => Pages\CreateUrgentCommunitySupport::route('/create'),
            'edit' => Pages\EditUrgentCommunitySupport::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
