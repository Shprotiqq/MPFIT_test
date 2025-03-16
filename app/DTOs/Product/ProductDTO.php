<?php

namespace App\DTOs\Product;


abstract class ProductDTO
{
    public function __construct(
        public string $name,
        public int $category_id,
        public ?string $description = null,
        public float $price,
    )
    {
        if ($price < 0) {
            throw new \InvalidArgumentException('Цена не может быть отрицательной.');
        }
    }
}