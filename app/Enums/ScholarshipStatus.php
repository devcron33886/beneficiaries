<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ScholarshipStatus: string implements HasColor, HasLabel
{
    case PROGRESS = 'progress';
    case GRADUATED = 'graduated';
    case PENDING = 'pending';

    public function getLabel(): string
    {
        return match ($this) {
            self::PROGRESS => 'In Progress',
            self::GRADUATED => 'Graduated',
            self::PENDING => 'Pending',
        };

    }

    public function getColor(): string
    {
        return match ($this) {
            self::PROGRESS => 'yellow',
            self::GRADUATED => 'green',
            self::PENDING => 'red',
        };

    }
}
