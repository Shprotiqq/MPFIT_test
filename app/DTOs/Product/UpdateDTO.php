<?php

namespace App\DTOs\Product;

final class UpdateDTO extends ProductDTO
{
    public function __construct(
        public readonly int $id,
        string $name,
        int $category_id,
        ?string $description = null,
        float $price,
    )
    {
        parent::__construct($name, $category_id, $description, $price);
    }
}