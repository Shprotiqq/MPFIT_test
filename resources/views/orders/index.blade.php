@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">
        Создать заказ
    </a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Создан</th>
            <th>Покупатель</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->getFormattedCreatedAtAttribute() }}</td>
                <td>{{ $order->getCustomerFullNameAttribute() }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->getFullPriceAttribute() }} руб.</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info">
                        Просмотр
                    </a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">
                        Редактировать
                    </a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection