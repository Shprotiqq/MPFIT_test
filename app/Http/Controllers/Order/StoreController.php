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
        $dto = $request->validate();

        Order::query()->create((array)$dto);

        return redirect()->route('orders.index');
    }
}