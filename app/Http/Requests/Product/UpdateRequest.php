<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\Product\UpdateDTO;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'category_id' => 'sometimes|nullable|exists:categories,id',
        ];
    }

    public function validate(): UpdateDTO
    {
        return new UpdateDTO(
            id: $this->route('id'),
            name: $this->input('name', $this->product->name),
            description: $this->input('description', $this->product->description),
            price: (float) $this->input('price', $this->product->price),
            category_id: $this->input('category_id', $this->product->category_id),
        );
    }
}
