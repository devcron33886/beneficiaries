<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum GenderEnum: string implements HasColor, HasIcon, HasLabel
{
    case MALE = 'male';
    case FEMALE = 'female';
    case F = 'F';
    case M = 'M';

    public function getLabel(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::F => 'Female',
            self::M => 'Male',
        };
    }

    public function getIcon(): string
    {
        return 'heroicon-o-user-circle';
    }

    public function getColor(): string
    {
        return match ($this) {
            self::MALE => 'info',
            self::FEMALE => 'success',
            self::F => 'success',
            self::M => 'info',
        };
    }
}
