<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

final class ShowController extends Controller
{
    public function __invoke(Product $product): View
    {
        return view('products.show', compact('product'));
    }
}
