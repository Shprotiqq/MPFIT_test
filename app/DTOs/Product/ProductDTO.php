<?php

namespace App\DTOs\Product;


abstract class ProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $category_id,
        public readonly ?string $description = null,
        public readonly float $price,
    )
    {
        if ($price < 0) {
            throw new \InvalidArgumentException('Цена не может быть отрицательной.');
        }
    }
}