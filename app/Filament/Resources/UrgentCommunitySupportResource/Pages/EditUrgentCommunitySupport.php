<?php

namespace App\Filament\Resources\UrgentCommunitySupportResource\Pages;

use App\Filament\Resources\UrgentCommunitySupportResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditUrgentCommunitySupport extends EditRecord
{
    protected static string $resource = UrgentCommunitySupportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
