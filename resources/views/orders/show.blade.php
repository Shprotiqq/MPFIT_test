@extends('layouts.app')

@section('title', 'Просмотр заказа')

@section('content')
    <h1>Просмотр заказа</h1>
    <p><strong>ID:</strong> {{ $order->id }}</p>
    <p><strong>Дата создания:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Покупатель:</strong> {{ $order->fullName }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Итоговая цена:</strong> {{ $order->fullPrice }} руб.</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Комментарий:</strong> {{ $order->customer_comment }}</p>

    @if ($order->status->value === \App\Enums\OrderStatus::New->value)
        <form action="{{ route('orders.complete', $order) }}" method="POST" class="my-3">
            @csrf
            <button type="submit" class="btn btn-success">
                Завершить заказ
            </button>
        </form>
    @else
        <p class="text-muted">
            Заказ уже выполнен.
        </p>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
@endsection
