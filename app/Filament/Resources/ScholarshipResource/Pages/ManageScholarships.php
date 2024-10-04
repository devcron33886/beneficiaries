<?php

namespace App\Filament\Resources\ScholarshipResource\Pages;

use App\Filament\Resources\ScholarshipResource;
use App\Filament\Resources\ScholarshipResource\Widgets\ScholarshipWidget;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageScholarships extends ManageRecords
{
    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            ScholarshipWidget::class,
        ];
    }
}
