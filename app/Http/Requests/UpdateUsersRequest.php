<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check() && Auth::user())
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
            'email' => 'required|max:191',
            'phone' => 'required|max:15',
            'card_last_four' => 'required|min:12|max:19',
            'card_valid' => 'required|min:5|max:5',
            'card_ccv' => 'required|min:3|max:3',
            'packet' => 'required',
        ];
    }
}
