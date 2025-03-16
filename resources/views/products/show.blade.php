@extends('layouts.app')

@section('title', 'Просмотр товара')

@section('content')
    <h1>Просмотр товара</h1>
    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Название:</strong> {{ $product->name }}</p>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
@endsection