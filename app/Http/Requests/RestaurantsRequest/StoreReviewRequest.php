<?php

namespace App\Http\Requests\RestaurantsRequest;

use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreReviewRequest extends FormRequest
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
        return [
            'restaurant_id' => ['required', 'integer', 'exists:restaurants,id'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'review' => ['required', 'string'],
            'rate' => ['required', 'string'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        $data['date'] = Carbon::now()->format('M d,Y');
        $data['reviewable_id'] = $data['restaurant_id'];
        $data['reviewable_type'] = Restaurant::class;
        $data = Arr::except($data, ['restaurant_id']);
        return  $data;
    }

}
