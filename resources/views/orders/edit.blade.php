@extends('layouts.app')

@section('title', 'Редактировать заказ')

@section('content')
    <h1>Редактировать заказ</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_last_name" class="form-label">
                Фамилия покупателя
            </label>
            <input type="text" name="customer_last_name" id="customer_last_name" class="form-control"
                   value="{{ $order->customer_last_name }}" required>
            <label for="customer_last_name" class="form-label">
                Имя покупателя
            </label>
            <input type="text" name="customer_first_name" id="customer_first_name" class="form-control"
                   value="{{ $order->customer_first_name }}" required>
            <label for="customer_last_name" class="form-label">
                Отчество покупателя (если имеется)
            </label>
            <input type="text" name="customer_middle_name" id="customer_middle_name" class="form-control"
                   value="{{ $order->customer_middle_name }}">
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">
                Товар
            </label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>
                        {{ $product->name }} - {{ $product->price }} руб.
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">
                Количество
            </label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                   value="{{ $order->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">
                Статус
            </label>
            <select name="status" id="status" class="form-control" required>
                <option value="Новый" {{ $order->status->value == 'Новый' ? 'selected' : '' }}>Новый</option>
                <option value="Выполнен" {{ $order->status->value == 'Выполнен' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="customer_comment" class="form-label">
                Комментарий к заказу
            </label>
            <textarea name="customer_comment" id="customer_comment" class="form-control">
                {{ $order->customer_comment }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-warning">Обновить</button>
    </form>
@endsection