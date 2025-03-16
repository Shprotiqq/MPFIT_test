<?php

namespace App\DTOs\Order;

class UpdateDTO extends OrderDTO
{
    public readonly int $id;

    public function __construct(
        int $id,
        string $customer_last_name,
        string $customer_first_name,
        string $customer_middle_name,
        string $status,
        ?string $customer_comment,
        int $product_id,
        int $quantity,
        int $total_price,
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
        $this->id = $id;
    }
}