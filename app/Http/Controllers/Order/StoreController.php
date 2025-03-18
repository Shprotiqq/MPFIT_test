<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;

final class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        Order::query()->create([
            'customer_last_name' => $requestData['customer_last_name'],
            'customer_first_name' => $requestData['customer_first_name'],
            'customer_middle_name' => $requestData['customer_middle_name'] ?? null,
            'status' => $requestData['status'],
            'customer_comment' => $requestData['customer_comment'] ?? null,
            'product_id' => $requestData['product_id'],
            'quantity' => $requestData['quantity']
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан');
    }
}
