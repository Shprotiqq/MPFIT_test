<?php

namespace App\Enums;

enum OrderStatus: string
{
    case New = 'Новый';
    case Completed = 'Выполнен';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}