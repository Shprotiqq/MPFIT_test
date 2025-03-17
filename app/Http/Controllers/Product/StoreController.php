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
        $dto = $request->validate();

        $product = Product::query()->create([
            'name' => $dto->name,
            'category_id' => $dto->category_id,
            'description' => $dto->description,
            'price' => $dto->price,
        ]);

        return redirect(route('products.index'));
    }
}
