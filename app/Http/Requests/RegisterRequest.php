<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'  => 'required|min:6|unique:users,username',
            'email'     => 'required|unique:users,email|email:dns',
            'password'  => 'required|min:6|same:cpassword',
            'cpassword' => 'required|min:6|same:password',
            'fullname'  => 'required'
        ];
    }
}
