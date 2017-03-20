<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;

class ProductRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'price.required' => 'Price is required',
            'title.alpha' => 'Title should be alphanumeric',
            'price.float' => 'Price should be a float value',
            'title.max' => 'Title should not exceed 128 characters',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|alpha|max:128',
            'price' => 'required|numeric'
        ];
    }
}
