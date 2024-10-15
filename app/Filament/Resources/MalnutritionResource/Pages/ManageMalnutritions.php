<?php

namespace App\Filament\Resources\MalnutritionResource\Pages;

use App\Filament\Resources\MalnutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMalnutritions extends ManageRecords
{
    protected static string $resource = MalnutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
