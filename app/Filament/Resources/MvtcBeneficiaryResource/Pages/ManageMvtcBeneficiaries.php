<?php

namespace App\Filament\Resources\MvtcBeneficiaryResource\Pages;

use App\Filament\Resources\MvtcBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMvtcBeneficiaries extends ManageRecords
{
    protected static string $resource = MvtcBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
