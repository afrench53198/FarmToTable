<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessRequest extends FormRequest
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
            'phone' => 'nullable|phone|numeric',
            'email' => 'nullable|email',
            'street'=> 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:2',
            'zip' => 'required|max:5|string', 
        ];
    }
}
