<?php

namespace App\Filament\Resources\MalnutritionResource\Pages;

use App\Filament\Resources\MalnutritionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMalnutrition extends EditRecord
{
    protected static string $resource = MalnutritionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
