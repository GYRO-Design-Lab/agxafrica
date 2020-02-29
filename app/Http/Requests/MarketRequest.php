<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
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
            'commodity' => 'required|string',
            'specification' => 'nullable|string',
            'location' => 'required|string',
            'photo' => 'required|file|mimes:png,jpg,jpeg',
            'quantity' => 'required|string',
            'price' => 'required|numeric',
            'trade_type' => 'required|in:buy,sell',
        ];
    }
}
