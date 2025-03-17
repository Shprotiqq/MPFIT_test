<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Product;

final class IndexController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));

    }
}
