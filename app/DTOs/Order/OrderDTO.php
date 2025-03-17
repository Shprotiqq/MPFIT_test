<?php

namespace App\DTOs\Order;

abstract class OrderDTO
{
    public function __construct(
        public readonly string $customer_last_name,
        public readonly string $customer_first_name,
        public readonly ?string $customer_middle_name,
        public readonly int $product_id,
        public readonly int $quantity,
        public readonly string $status,
        public readonly ?string $customer_comment,
    )
    {
        if ($quantity < 1) {
            throw new \InvalidArgumentException('Количество товара должно быть не менее 1');
        }
    }
}