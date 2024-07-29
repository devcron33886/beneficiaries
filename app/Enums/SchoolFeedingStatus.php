<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum SchoolFeedingStatus: string implements HasColor, HasIcon, HasLabel
{
    case DROPOUT = 'dropout';
    case PENDING = 'pending';
    case GRADUATED = 'graduated';

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DROPOUT => 'primary',
            self::PENDING => 'warning',
            self::GRADUATED => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::DROPOUT => 'heroicon-o-times-circle',
            self::PENDING => 'heroicon-0-exclamation-triangle',
            self::GRADUATED => 'heroicon-o-check-badge',
        };
    }
}
