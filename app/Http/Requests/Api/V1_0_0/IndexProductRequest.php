<?php

namespace App\Http\Requests\Api\V1_0_0;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'q' => ['sometimes', 'string', 'max:255'],
            'price_from' => ['sometimes', 'integer', 'min:0'],
            'price_to' => ['sometimes', 'integer', 'min:0'],
            'category_id' => ['sometimes', 'integer', 'min:1', 'exists:categories,id'],
            'in_stock' => ['sometimes', 'boolean'],
            'rating_from' => ['sometimes', 'numeric', 'min:0', 'max:5'],
            'sort' => ['sometimes', 'string', 'in:price_asc,price_desc,rating_desc,newest'],
        ];
    }
}
