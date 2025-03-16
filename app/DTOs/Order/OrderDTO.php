<?php

namespace App\DTOs\Order;


abstract class OrderDTO
{
    public function __construct(
        public string $customer_last_name,
        public string $customer_first_name,
        public ?string $customer_middle_name,
        public int $product_id,
        public int $quantity,
        public string $status,
        public ?string $customer_comment,
    )
    {
        if ($quantity < 1) {
            throw new \InvalidArgumentException('Количество товара должно быть не менее 1');
        }
    }
}