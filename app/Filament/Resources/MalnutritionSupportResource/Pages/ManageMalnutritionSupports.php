<?php

namespace App\Filament\Resources\MalnutritionSupportResource\Pages;

use App\Filament\Resources\MalnutritionSupportResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMalnutritionSupports extends ManageRecords
{
    protected static string $resource = MalnutritionSupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('Add New Support')->icon('heroicon-o-plus-circle'),
        ];
    }
}
