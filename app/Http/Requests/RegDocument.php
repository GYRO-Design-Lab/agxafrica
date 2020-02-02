<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegDocument extends FormRequest
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
            'cac_certificate' => 'required|file|mimes:png,jpg,jpeg,pdf',
            'nepc_certificate' => 'required|file|mimes:png,jpg,jpeg,pdf',
            'cac_1_1' => 'required|file|mimes:png,jpg,jpeg,pdf',
            'memart' => 'required|file|mimes:png,jpg,jpeg,pdf',
            'others' => 'nullable|array',
            // 'others.document' => 'nullable|file|mimes:png,jpg,jpeg,pdf',
            // 'others.type' => 'nullable|string',
        ];
    }
}
