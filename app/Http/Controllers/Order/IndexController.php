<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Order;

final class IndexController extends Controller
{
    public function __invoke(): View
    {
        $orders = Order::with('product')->get();

        return view('orders.index', compact('orders'));
    }
}