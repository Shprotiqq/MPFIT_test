<?php

namespace App\DTOs\Product;

class StoreDTO extends ProductDTO
{
    public function __construct(
        string $name,
        string $description,
        float $price,
        ?int $categoryId = null,
    )
    {
        parent::__construct($name, $description, $price, $categoryId);
    }
}