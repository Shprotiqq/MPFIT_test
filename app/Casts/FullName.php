<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FullName implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return trim("{$model->customer_last_name} {$model->customer_first_name} {$model->customer_middle_name}");
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
