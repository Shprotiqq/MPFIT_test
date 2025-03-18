<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Product;

final class CreateController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }
}