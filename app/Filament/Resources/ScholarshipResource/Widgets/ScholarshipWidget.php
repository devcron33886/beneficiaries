<?php

namespace App\Filament\Resources\ScholarshipResource\Widgets;

use App\Models\Scholarship;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ScholarshipWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Beneficiaries', Scholarship::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            Stat::make('Males', Scholarship::where('gender', 'M')->count())
                ->chart([7, 2, 10, 3, 15, 8, 17])
                ->color('success'),
            Stat::make('Females', Scholarship::where('gender', 'F')->count())
                ->chart([7, 2, 10, 3, 15, 0, 18])
                ->color('info'),
        ];
    }
}
