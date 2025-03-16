<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\Product\StoreDTO;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function validate(): StoreDTO
    {
        return new StoreDTO(
            name: $this->input('name'),
            description: $this->input('description'),
            price: (float)$this->input('price'),
            categoryId: $this->input('category_id'),
        );
    }
}
