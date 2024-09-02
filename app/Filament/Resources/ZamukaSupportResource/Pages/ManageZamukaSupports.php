<?php

namespace App\Filament\Resources\ZamukaSupportResource\Pages;

use App\Filament\Resources\ZamukaSupportResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageZamukaSupports extends ManageRecords
{
    protected static string $resource = ZamukaSupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
