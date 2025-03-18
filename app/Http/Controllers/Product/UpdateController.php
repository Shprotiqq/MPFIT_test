<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

final class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product): RedirectResponse
    {
        $requestData = $request->validated();

        $product->update([
            'name' => $requestData['name'],
            'category_id' => $requestData['category_id'],
            'description' => $requestData['description'] ?? null,
            'price' => $requestData['price'],
        ]);

        return redirect()->route('products.index')->with('success', 'Информация о продукте обновлена');
    }
}
