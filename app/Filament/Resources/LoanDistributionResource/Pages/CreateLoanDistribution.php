<?php

namespace App\Filament\Resources\LoanDistributionResource\Pages;

use App\Filament\Resources\LoanDistributionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLoanDistribution extends CreateRecord
{
    protected static string $resource = LoanDistributionResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
