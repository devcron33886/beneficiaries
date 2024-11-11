<?php

namespace App\Filament\Resources\LoanDistributionResource\Pages;

use App\Filament\Resources\LoanDistributionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLoanDistributions extends ListRecords
{
    protected static string $resource = LoanDistributionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
