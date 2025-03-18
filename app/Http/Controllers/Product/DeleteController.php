<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

final class DeleteController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
