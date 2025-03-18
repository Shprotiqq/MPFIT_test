<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\OrderStatus;

class UpdateRequest extends FormRequest
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
}
