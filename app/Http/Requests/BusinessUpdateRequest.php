<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessUpdateRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'description'=> 'required|string',
            'phone' => 'required|phone|numeric',
            'email' => 'email',
            'street'=> 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:2',
            'zip' => 'required|max:5|string', 
        ];
    }

    public function messages() {
        return [
            'phone.numeric'=>'your phone number is invalid',
        ];
    }
}
