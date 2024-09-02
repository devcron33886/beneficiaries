<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum IntakeEnum: string implements HasLabel
{
    case MarchInTake = 'march';
    case SeptemberIntake = 'september';

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }
}
