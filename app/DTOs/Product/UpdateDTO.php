<?php

namespace App\DTOs\Product;

class UpdateDTO extends ProductDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public int $category_id,
        public ?string $description,
        public float $price,
    )
    {
        parent::__construct($name, $category_id, $description, $price);
    }
}