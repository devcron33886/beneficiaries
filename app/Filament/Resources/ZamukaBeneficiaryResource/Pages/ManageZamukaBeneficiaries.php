<?php

namespace App\Filament\Resources\ZamukaBeneficiaryResource\Pages;

use App\Filament\Resources\ZamukaBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Widgets\ZamukaOverview;

class ManageZamukaBeneficiaries extends ManageRecords
{
    protected static string $resource = ZamukaBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
            Actions\CreateAction::make()->slideOver()->label('Add Zamuka Beneficiary')->icon('heroicon-o-plus-circle'),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            ZamukaOverview::class,
        ];
    }
}
