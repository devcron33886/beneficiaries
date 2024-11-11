<?php

namespace App\Filament\Resources\LoanDistributionResource\Pages;

use App\Filament\Resources\LoanDistributionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditLoanDistribution extends EditRecord
{
    protected static string $resource = LoanDistributionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
