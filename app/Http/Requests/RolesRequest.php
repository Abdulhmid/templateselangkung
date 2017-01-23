<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Increase\Models\Roles;

class RolesRequest extends FormRequest
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

        $rules = Roles::$rules;

        if (is_numeric($lastUrl)) {
            $rules['name'] = 'required|unique:roles,name,'.$lastUrl;
            $rules['label'] = 'required|unique:roles,label,'.$lastUrl;
        }else{
            $rules['name'] = 'required|unique:roles,name';
            $rules['label'] = 'required|unique:roles,label';
        }

        return $rules;
    }
}
