<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\OrderStatus;
use App\Casts\FullName;
use App\Casts\FullPrice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'fullName' => FullName::class,
        'fullPrice' => FullPrice::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
