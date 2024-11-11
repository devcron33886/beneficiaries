<?php

namespace App\Filament\Resources\VslaResource\Pages;

use App\Filament\Resources\VslaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVsla extends EditRecord
{
    protected static string $resource = VslaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
