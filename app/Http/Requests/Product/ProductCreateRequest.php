<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock_count' => 'required|integer|min:0|max:100000',
            'sale_price' => 'required|numeric|min:1',
            'purchase_price' => 'required|numeric|min:1',
            'expire_date' => 'required|date',
            'description' => 'nullable|max:2000',
            'thumb_img' => 'required|mimes:png,jpg,jpeg'
        ];
    }
}
