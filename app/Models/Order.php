<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'status',
        'customer_comment',
        'product_id',
        'quantity',
        'total_price'
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];
}
