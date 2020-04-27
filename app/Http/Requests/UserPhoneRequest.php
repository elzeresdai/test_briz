<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' =>'required|string|min:3|max:100',
            'last_name'=>'required|string|min:3|max:100',
            '*.phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'First name must be min 5 characters, max 100',
            'last_name.required'=>'Last name name must be min 5 characters, max 100',
            'phone.required'=>'Please check phone numbers, something went wrong'
        ];
    }
}
