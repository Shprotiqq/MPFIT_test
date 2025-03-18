<?php

declare(strict_types=1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

final class FullPrice implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): int|float
    {
        return $model->product->price * $model->quantity;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
