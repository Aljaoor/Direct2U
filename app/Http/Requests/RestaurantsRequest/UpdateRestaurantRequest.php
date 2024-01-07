<?php

namespace App\Http\Requests\RestaurantsRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRestaurantRequest extends FormRequest
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
            'id' => ['required','integer','exists:restaurants,id'],
            'user_name' => ['required','string'],
            'name' => ['required','string'],
            'city' => ['required','string'],
            'email' => ['required','email'],
            'password' => ['nullable','string'],
            'mobile' => ['required','string'],
            'image' => ['image'],
            'open_time' => ['required','sometimes'],
            'close_time' => ['required','sometimes'],

        ];
        foreach (config('translatable.locales') as $locale){
            $rules[$locale] = 'array';
            $rules[$locale . '.description'] = ['required', 'string'];
            $rules[$locale . '.title'] = ['required', 'string'];
        }
        return $rules;
    }

}
