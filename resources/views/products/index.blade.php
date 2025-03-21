@extends('layouts.app')

@section('title', 'Список товаров')

@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        Создать товар
    </a>
    <table class="table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }} руб.</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info">Просмотр</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('products.delete', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection