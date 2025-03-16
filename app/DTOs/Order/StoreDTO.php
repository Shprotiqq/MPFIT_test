<?php

namespace App\DTOs\Order;

class StoreDTO extends OrderDTO
{
    public function __construct(
        string $customer_last_name,
        string $customer_first_name,
        ?string $customer_middle_name,
        string $status,
        ?string $customer_comment,
        int $product_id,
        int $quantity,
        float $total_price
    )
    {
        parent::__construct(
            $customer_last_name,
            $customer_first_name,
            $customer_middle_name,
            $status,
            $customer_comment,
            $product_id,
            $quantity,
            $total_price
        );
    }
}