<?php

namespace App\Enum\Concerns;

trait IsStr
{

    public static function getValues(): array
    {
        return array_map(fn($type) => $type->value, self::cases());
    }
}
