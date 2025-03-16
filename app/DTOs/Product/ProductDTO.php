<?php

namespace App\DTOs\Product;


use InvalidArgumentException;

abstract class ProductDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public ?int $category_id = null,
        public readonly ?int $id = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {
        if ($price < 0) {
            throw new InvalidArgumentException('Цена не может быть отрицательной.');
        }
    }
}