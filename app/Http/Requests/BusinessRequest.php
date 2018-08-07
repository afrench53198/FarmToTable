<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'name'=> 'nullable|string|max:255',
            'type'=>'nullable|string',
            'description'=> 'nullable|string',
            'contact_name'=>'nullable|string|max:255',
            'phone' => 'nullable|phone',
            'email' => 'nullable|email',
            'street'=> 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string|max:2',
            'zip' => 'nullable|min:5|string', 
        ];
    }

    public function messages() {
        return [
            'zip.min' =>'your zip code must be at least 5 characters long',
            'email.email'=>'your email is invalid',
            'phone.numeric'=>'your phone number must be a number',
        ];
    }
}
