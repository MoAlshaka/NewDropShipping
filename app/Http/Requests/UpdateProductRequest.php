<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'sku' => 'required|max:100',
            'title' => 'required|max:100',
            'description' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'unit_cost' => 'required|numeric',
            'recommended_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'country' => 'required|array',
            'country.*' => 'exists:countries,id',
            'image' => 'nullable|mimes:png,jpg',
        ];
    }
}
