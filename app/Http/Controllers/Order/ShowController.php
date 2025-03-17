<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

final class ShowController extends Controller
{
    public function __invoke(Order $order): View
    {
        return view('orders.show', compact('order'));
    }
}