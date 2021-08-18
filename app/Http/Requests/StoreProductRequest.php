<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => [Rule::requiredIf(function() {
                return $this->routeIs('admin.kitchen.store');
            }), 'mimes:jpg,png,jpeg', 'max:5048'],
        ];
    }
}
