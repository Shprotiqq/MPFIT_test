<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\OrderStatus;
use App\DTOs\Order\UpdateDTO;
use App\Models\Product;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'customer_last_name' => 'sometimes|string|max:255',
            'customer_first_name' => 'sometimes|string|max:255',
            'customer_middle_name' => 'nullable|string|max:255',
            'status' => ['sometimes', Rule::enum(OrderStatus::class)],
            'customer_comment' => 'nullable|string',
            'product_id' => 'sometimes|integer|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
        ];
    }

    public function validate(): UpdateDTO
    {
        $product = Product::query()->find($this->input('product_id', $this->order->product_id));
        $quantity = $this->input('quantity', $this->order->quantity);
        $totalPrice = $product->price * $quantity;

        return new UpdateDTO(
            id: $this->route('order'),
            customer_last_name: $this->input('customer_last_name', $this->order->customer_last_name),
            customer_first_name: $this->input('customer_first_name', $this->order->customer_first_name),
            customer_middle_name: $this->input('customer_middle_name', $this->order->customer_middle_name),
            status: $this->input('status', $this->order->status),
            customer_comment: $this->input('customer_comment', $this->order->customer_comment),
            product_id: $this->input('product_id', $this->order->product_id),
            quantity: $quantity,
            total_price: $totalPrice,
        );
    }
}
