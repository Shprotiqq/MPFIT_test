<?php

namespace App\Enums;

enum OrderStatus: string
{
    case New = 'Новый';
    case Completed = 'Выполнен';
}