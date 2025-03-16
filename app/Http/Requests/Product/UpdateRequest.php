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
            'category_id' => 'sometimes|exists:categories,id',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
        ];
    }

    public function validate(): UpdateDTO
    {
        $price = $this->input('price', $this->product->price);
        $price = str_replace(',', '.', $price);
        $price = (float) $price;

        return new UpdateDTO(
            id: $this->product->id,
            name: $this->input('name', $this->product->name),
            category_id: (int) $this->input('category_id', $this->product->category_id),
            description: $this->input('description', $this->product->description),
            price: $price,
        );
    }
}
