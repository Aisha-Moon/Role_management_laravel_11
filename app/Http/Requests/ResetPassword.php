<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'password'=>'required|min:6',
           'confirm_password'=>'required|min:6|same:password',
        ];
    }
}
