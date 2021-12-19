<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFavoriteRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|string',
            'category' => ['required', Rule::in(['park', 'city', 'running_place'])],
            'coordinates' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is mandatory!',
            'name.max' => 'The name cannot be longer than 255 signs',
            'name.string' => 'A name must contain strings',
            'category.required' => 'You have to choose a category',
        ];
    }
}
