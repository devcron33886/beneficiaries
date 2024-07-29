<?php

namespace App\Filament\Resources\MalnutritionResource\Pages;

use App\Filament\Resources\MalnutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMalnutrition extends ViewRecord
{
    protected static string $resource = MalnutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
