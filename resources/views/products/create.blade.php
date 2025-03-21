@extends('layouts.app')

@section('title', 'Создание товара')

@section('content')
    <h1>Создание товара</h1>
    <form action="{{ route('products.store') }}" method="POST" class="mb-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">
                Название товара
            </label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">
                Выберите категорию
            </label>
            <select name="category_id" id="category_id" class="form-control required" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">
                Описание товара
            </label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">
                Введите цену товара
            </label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">
            Добавить новый товар
        </button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-primary">
        Назад
    </a>
@endsection