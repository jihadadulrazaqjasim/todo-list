<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public const DEFAULT = self::LOW;

    public static function getValues(): array
    {
        return collect(self::cases())->map(fn (self $value) => $value->value)->toArray();
    }

    public static function getNames(): array
    {
        return collect(self::cases())->map(fn (self $value) => $value->name)->toArray();
    }
}
