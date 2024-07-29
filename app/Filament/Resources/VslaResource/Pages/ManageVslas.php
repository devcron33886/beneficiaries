<?php

namespace App\Filament\Resources\VslaResource\Pages;

use App\Filament\Resources\VslaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVslas extends ManageRecords
{
    protected static string $resource = VslaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('Add new vsla'),
        ];
    }
}
