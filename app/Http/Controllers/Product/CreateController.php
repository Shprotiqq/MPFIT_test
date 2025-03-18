<?php

declare(strict_types=1);

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Category;

final class CreateController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
}