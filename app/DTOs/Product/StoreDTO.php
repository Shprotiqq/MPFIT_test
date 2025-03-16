<?php

namespace App\DTOs\Product;

class StoreDTO extends ProductDTO
{
    public function __construct(
        string $name,
        int $categoryId,
        ?string $description,
        float $price,
    )
    {
        parent::__construct($name, $categoryId, $description, $price);
    }
}