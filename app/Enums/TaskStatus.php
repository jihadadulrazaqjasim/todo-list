<?php

namespace App\Enums;

enum TaskStatus: string

{
    case PENDING = 'pending';
    case COMPLETED = 'completed';

    public const DEFAULT = self::PENDING;

    public static function getValues(): array
    {
        return collect(self::cases())->map(fn (self $value) => $value->value)->toArray();
    }

    public static function getNames(): array
    {
        return collect(self::cases())->map(fn (self $value) => $value->name)->toArray();
    }

}
