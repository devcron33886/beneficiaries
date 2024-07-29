<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SchoolFeedingGrade: string implements HasColor, HasLabel
{
    case P1 = 'primary one';
    case P2 = 'primary two';
    case P3 = 'primary three';
    case P4 = 'primary four';
    case P5 = 'primary five';
    case P6 = 'primary six';

    case S1 = 'senior one';
    case S2 = 'senior two';
    case S3 = 'senior three';
    case S4 = 'senior four';
    case S5 = 'senior five';
    case S6 = 'senior six';

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }

    public function getColor(): string
    {
        return match ($this) {
            self::P1 => 'primary',
            self::P2 => 'secondary',
            self::P3 => 'warning',
            self::P4 => 'background',
            self::P5 => 'info',
            self::P6 => 'success',
            self::S1 => 'primary',
            self::S2 => 'secondary',
            self::S3 => 'warning',
            self::S4 => 'background',
            self::S5 => 'info',
            self::S6 => 'success',
        };
    }
}
