<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;
use App\Models\Product;

final class EditController extends Controller
{
    public function __invoke(Order $order): View
    {
        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }
}