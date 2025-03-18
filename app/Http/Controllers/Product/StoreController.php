<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

final class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        Product::query()->create([
            'name' => $requestData['name'],
            'category_id' => $requestData['category_id'],
            'description' => $requestData['description'] ?? null,
            'price' => $requestData['price'],
        ]);

        return redirect()->route('products.index')->with('success', 'Продукт успешно создан');
    }
}
