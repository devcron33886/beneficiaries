<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EcdGrade: string implements HasColor, HasLabel
{
    case Baby = 'Baby';
    case Middle = 'Middle';
    case Top = 'Top';

    public function getColor(): string
    {
        return match ($this) {
            self::Baby => 'info',
            self::Middle => 'warning',
            self::Top => 'success',
        };
    }

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }
}
