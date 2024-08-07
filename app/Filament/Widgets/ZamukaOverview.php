<?php

namespace App\Filament\Widgets;

use App\Models\ZamukaBeneficiary;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ZamukaOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Zamuka', ZamukaBeneficiary::count())
                ->description('Total Zamuka Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-home', IconPosition::Before)
                ->color('info'),
        ];
    }
}
