<?php

namespace App\Http\Requests\CategoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        ];
        foreach (config('translatable.locales') as $locale){
            $rules[$locale] = 'array';
            $rules[$locale . '.name'] = ['required', 'string'];
        }
        return $rules;
    }
}
