<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum QuestionDifficultyLevelEnum: string implements HasLabel
{
    case Easy = 'Easy';
    case Medium = 'Medium';
    case Hard = 'Hard';

    public function getLabel(): string
    {
        return match ($this) {
            self::Easy => 'سهل',
            self::Medium => 'متوسط',
            self::Hard => 'صعب',
        };
    }
}
