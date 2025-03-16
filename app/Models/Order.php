<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\OrderStatus;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_last_name',
        'customer_first_name',
        'customer_middle_name',
        'status',
        'customer_comment',
        'product_id',
        'quantity',
        'total_price'
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getCustomerFullNameAttribute(): string
    {
        return trim("{$this->customer_last_name} {$this->customer_first_name} {$this->customer_middle_name}");
    }
}
