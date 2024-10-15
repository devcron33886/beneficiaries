<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum NutritionColor: string implements HasColor, HasLabel
{
    case Green = 'Green';
    case Yellow = 'Yellow';
    case Red = 'Red';

    public function getLabel(): string
    {
        return match ($this) {
            self::Green => 'Green',
            self::Yellow => 'Yellow',
            self::Red => 'Red',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Green => 'success',
            self::Yellow => 'warning',
            self::Red => 'primary',
        };
    }
}
