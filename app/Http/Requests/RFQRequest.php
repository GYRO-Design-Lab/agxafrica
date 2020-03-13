<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RFQRequest extends FormRequest
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
                    'expiry' => 'required|date'                    
                ];

        if ($this->getMethod() == 'POST') {
            $rules += [ 
                        'commodity' => 'required|string',
                        'category' => 'required|string',
                        'specification' => 'required|string',
                        'delivery_location' => 'required|string',
                        'quantity' => 'required|string',
                        'price' => 'required|numeric',
                    ];
        }

        return $rules;
    }
}
