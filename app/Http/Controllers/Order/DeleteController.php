<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

final class DeleteController extends Controller
{
    public function __invoke(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}