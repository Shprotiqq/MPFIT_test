<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Product::with('category')->get();
        return view('products.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $dto = $request->validate();

        $product = Product::query()->create([
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'category_id' => $dto->category_id,
        ]);

        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $dto = $request->validate();

        $product->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'category_id' => $dto->category_id,
        ]);

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
