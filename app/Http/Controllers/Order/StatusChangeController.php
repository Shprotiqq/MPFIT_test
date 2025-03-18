<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use App\Enums\OrderStatus;

final class StatusChangeController extends Controller
{
    public function __invoke(Order $order): RedirectResponse
    {
        if($order->status->value === OrderStatus::New->value) {
            $order->update(['status' => OrderStatus::Completed->value]);
        }

        return redirect()->back()->with('success', 'Статус заказа был изменен');
    }
}
