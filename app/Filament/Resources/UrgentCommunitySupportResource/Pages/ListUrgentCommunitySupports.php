<?php

namespace App\Filament\Resources\UrgentCommunitySupportResource\Pages;

use App\Filament\Resources\UrgentCommunitySupportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUrgentCommunitySupports extends ListRecords
{
    protected static string $resource = UrgentCommunitySupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
