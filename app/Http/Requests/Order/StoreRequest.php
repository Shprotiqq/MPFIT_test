<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\OrderStatus;
use App\DTOs\Order\StoreDTO;
use App\Models\Product;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_last_name' => 'required|string|max:255',
            'customer_first_name' => 'required|string|max:255',
            'customer_middle_name' => 'nullable|string|max:255',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => ['required', Rule::enum(OrderStatus::class)],
            'customer_comment' => 'nullable|string',
        ];
    }

    public function validate(): StoreDTO
    {
        return new StoreDTO(
            customer_last_name: $this->input('customer_last_name'),
            customer_first_name: $this->input('customer_first_name'),
            customer_middle_name: $this->input('customer_middle_name'),
            product_id: $this->input('product_id'),
            quantity: $this->input('quantity'),
            status: $this->input('status'),
            customer_comment: $this->input('customer_comment'),
        );
    }
}
