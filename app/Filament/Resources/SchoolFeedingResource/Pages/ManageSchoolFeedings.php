<?php

namespace App\Filament\Resources\SchoolFeedingResource\Pages;

use App\Filament\Resources\SchoolFeedingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSchoolFeedings extends ManageRecords
{
    protected static string $resource = SchoolFeedingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->slideOver()->label('Add new Beneficiary')->icon('heroicon-o-plus-circle'),
        ];
    }
}
