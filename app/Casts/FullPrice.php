<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FullPrice implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return $model->product->price * $model->quantity;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
