<?php

namespace App\Filament\Resources\EcdBeneficiaryResource\Widgets;

use App\Models\EcdBeneficiary;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EcdWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Beneficiaries', EcdBeneficiary::count()),
            Stat::make('Males', EcdBeneficiary::where('gender', 'male')->count()),
            Stat::make('Females', EcdBeneficiary::where('gender', 'female')->count()),
        ];
    }
}
