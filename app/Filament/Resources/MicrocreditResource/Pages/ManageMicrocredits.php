<?php

namespace App\Filament\Resources\MicrocreditResource\Pages;

use App\Filament\Resources\MicrocreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMicrocredits extends ManageRecords
{
    protected static string $resource = MicrocreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('Add New Beneficiary')->icon('heroicon-o-plus-circle'),
        ];
    }
}
