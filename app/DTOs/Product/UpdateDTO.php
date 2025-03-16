<?php

namespace App\DTOs\Product;

class UpdateDTO extends ProductDTO
{
    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        ?int $category_id = null,
    )
    {
        parent::__construct($id, $name, $description, $price, $category_id);
    }
}