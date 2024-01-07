<?php

namespace App\Http\Requests\MealRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules =[
            'restaurant_id' => ['nullable','integer','exists:restaurants,id'],
            'category_id' => ['required','integer','exists:categories,id'],
            'image' => ['required','image'],
            'price' => ['required','integer'],

        ];
        foreach (config('translatable.locales') as $locale){
            $rules[$locale] = 'array';
            $rules[$locale . '.name'] = ['required', 'string'];
        }
        return $rules;
    }
}
