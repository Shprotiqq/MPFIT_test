<?php

namespace App\DTOs\Order;


abstract class OrderDTO
{
    public function __construct(
        public string $customer_last_name,
        public string $customer_first_name,
        public ?string $customer_middle_name,
        public string $status,
        public ?string $customer_comment,
        public int $product_id,
        public int $quantity,
        public float $total_price,
    )
    {
        if ($quantity <= 1) {
            throw new \InvalidArgumentException('Количество товара должно быть не менее 1');
        }

        if ($total_price <= 0) {
            throw new \InvalidArgumentException('Итоговая цена не может быть отрицательной');
        }
    }
}