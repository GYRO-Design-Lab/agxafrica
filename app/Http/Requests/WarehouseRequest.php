<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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
                    'manager' => 'required|string',
                    'contact_person' => 'required|string',
                    'email' => 'required|string',
                    'phone' => 'required|string',
                    'size' => 'required|string',
                    'capacity' => 'required|string',
                ];

        if ($this->getMethod() == 'POST') {
            $rules += [ 
                        'name' => 'required|string',
                        'address' => 'required|string',
                        'photo' => 'required|file|mimes:png,jpg,jpeg',
                    ];
        }

        return $rules;
    }
}
