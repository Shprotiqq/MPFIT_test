@extends('layouts.app')

@section('title', 'Создать заказ')

@section('content')
    <h1>Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">
                Фамилия покупателя
            </label>
            <input type="text" name="customer_last_name" id="customer_last_name" class="form-control" required>
            <label for="customer_first_name" class="form-label">
                Имя покупателя
            </label>
            <input type="text" name="customer_first_name" id="customer_first_name" class="form-control" required>
            <label for="customer_middle_name">
                Отчество покупателя (если имеется)
            </label>
            <input type="text" name="customer_middle_name" id="customer_middle_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">
                Товар
            </label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }} руб.</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">
                Количество
            </label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">
                Статус
            </label>
            <select name="status" id="status" class="form-control" required>
                <option value="Новый">Новый</option>
                <option value="Выполнен">Выполнен</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="customer_comment" class="form-label">
                Комментарий
            </label>
            <textarea name="customer_comment" id="customer_comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection