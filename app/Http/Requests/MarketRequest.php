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
        $rules = [
                    'specification' => 'nullable|string',
                    'location' => 'required|string',
                    'quantity' => 'required|integer',
                    'unit' => 'required|in:kg,oz,lb,t',
                    'price' => 'required|numeric',
                ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                        'commodity' => 'required|string',
                        'photo' => 'required|file|mimes:png,jpg,jpeg',
                        'trade_type' => 'required|in:buy,sell',
                    ];
        }

        return $rules;
    }
}
