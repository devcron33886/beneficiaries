<?php

namespace App\Filament\Resources\VslaResource\Pages;

use App\Filament\Resources\VslaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVslas extends ListRecords
{
    protected static string $resource = VslaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
