@extends('layouts.app')

@section('title', 'Редактировать товар')

@section('content')
    <h1>Редактировать товар</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">
                Название товара
            </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">
                Категория товара
            </label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">
                Описание товара
            </label>
            <textarea name="description" id="description" class="form-control">
                {{ $product->description }}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">
                Цена товара
            </label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}"
                required>
        </div>
        <button type="submit" class="btn btn-warning">
            Обновить товар
        </button>
    </form>
@endsection