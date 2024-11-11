<?php

namespace App\Filament\Resources\CreditTopUpResource\Pages;

use App\Filament\Resources\CreditTopUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCreditTopUp extends ManageRecords
{
    protected static string $resource = CreditTopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('New Loan Top Up')->icon('heroicon-s-plus-circle'),
        ];
    }
}
