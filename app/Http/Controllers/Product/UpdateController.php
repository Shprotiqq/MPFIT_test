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
        $dto = $request->validate();

        $product->update([
            'id' => $dto->id,
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'category_id' => $dto->category_id,
        ]);

        return redirect(route('products.index'));
    }
}
