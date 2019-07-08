<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StorePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check() && Auth::user()->isAdmin() == 1)
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|max:191',
            'limitlist' => 'required|min:0|max:99999999999',
            'limitmails' => 'required|min:0|max:99999999999',
            'limittemplates' => 'required|min:0|max:99999999999',
            'price' => 'required|between:0,999.99'
        ];
    }
}
