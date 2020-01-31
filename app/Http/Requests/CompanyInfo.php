<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInfo extends FormRequest
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
            'cac_reg' => 'required|string|unique:companies',
            'nepc_reg' => 'required|string|unique:companies',
            'contact_person' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|string',
            'contact_position' => 'required|string',
            'commodities' => 'required|array',
        ];
    }
}
