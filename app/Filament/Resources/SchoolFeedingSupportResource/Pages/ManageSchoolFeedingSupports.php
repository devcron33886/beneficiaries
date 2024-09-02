<?php

namespace App\Filament\Resources\SchoolFeedingSupportResource\Pages;

use App\Filament\Resources\SchoolFeedingSupportResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSchoolFeedingSupports extends ManageRecords
{
    protected static string $resource = SchoolFeedingSupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
