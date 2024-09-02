<?php

namespace App\Filament\Widgets;

use App\Models\Vsla;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class VslaWidget extends BaseWidget
{
    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '15s';

    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Vsla::query()->withCount('members');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('code'),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('representative_name'),
            Tables\Columns\TextColumn::make('entrance_year')->sortable(),
        ];

    }
}
