<?php

namespace App\Filament\Resources\ToolkitResource\Pages;

use App\Filament\Resources\ToolkitResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageToolkits extends ManageRecords
{
    protected static string $resource = ToolkitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('Add Beneficiary')->icon('heroicon-o-plus-circle'),
        ];
    }
}
