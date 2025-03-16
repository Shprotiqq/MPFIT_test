<?php

namespace App\DTOs\Order;

class StoreDTO extends OrderDTO
{
    public function __construct(
        string $customer_last_name,
        string $customer_first_name,
        ?string $customer_middle_name,
        int $product_id,
        int $quantity,
        string $status,
        ?string $customer_comment,
    )
    {
        parent::__construct(
            $customer_last_name,
            $customer_first_name,
            $customer_middle_name,
            $product_id,
            $quantity,
            $status,
            $customer_comment,
        );
    }
}