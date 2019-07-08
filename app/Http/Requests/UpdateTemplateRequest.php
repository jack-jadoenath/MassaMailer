<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateTemplateRequest extends FormRequest
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
            'header_size' => 'required|min:0|max:350',
            'header_color' => 'required',
            'header_fontsize' => 'required|min:0|max:75',
            'header_fontcolor' => 'required',
            'footer_size' => 'required|min:0|max:350',
            'footer_color' => 'required',
            'footer_fontsize' => 'required|min:0|max:75',
            'footer_fontcolor' => 'required',
        ];
    }
}
