<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Increase\Models\Users;

class UsersRequest extends FormRequest
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
        $lastUrl = \Request::segment(2);

        $rules = Users::$rules;

        if (is_numeric($lastUrl)) {
            $rules['username']  = 'required|unique:users,username,'.$lastUrl;
            $rules['password']  = 'confirmed';
            $rules['email']     = 'required|email|unique:users,email,'.$lastUrl;
        }else{
            $rules['username']  = 'required|unique:users,username';
            $rules['password']  = 'required|confirmed';
            $rules['email']     = 'required|email|unique:users,email';
        }

        return $rules;
    }
}
