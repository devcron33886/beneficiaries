<?php

namespace App\Filament\Widgets;

use App\Models\Malnutrition;
use App\Models\Microcredit;
use App\Models\MvtcBeneficiary;
use App\Models\Scholarship;
use App\Models\SchoolFeeding;
use App\Models\Toolkit;
use App\Models\Vsla;
use App\Models\ZamukaBeneficiary;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Microcredit', Microcredit::count())
                ->description('Total Microcredit Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-credit-card', IconPosition::Before)
                ->color('success'),
            Stat::make('Malnutrition', Malnutrition::count())
                ->description('Total Malnutrition Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-users', IconPosition::Before)
                ->color('warning'),
            Stat::make('MVTC', MvtcBeneficiary::count())
                ->description('Total MVTC Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-academic-cap', IconPosition::Before)
                ->color('primary'),
            Stat::make('Zamuka', ZamukaBeneficiary::count())
                ->description('Total Zamuka Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-home', IconPosition::Before)
                ->color('info'),
            Stat::make('Vsla', Vsla::count())
                ->description('Total Vslas')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->color('warning'),
            Stat::make('School Feeding', SchoolFeeding::count())
                ->description('Total School Feeding Beneficiaries')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-o-building-office-2', IconPosition::Before)
                ->color('surface'),
            Stat::make('Scholarship', Scholarship::count()),
            Stat::make('Toolkit', Toolkit::count()),
        ];
    }
}
