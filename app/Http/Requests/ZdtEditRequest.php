<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZdtEditRequest extends FormRequest
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
        if($this->isMethod('POST')){
         return [
            'name'=>['required','string','min:3', 'max:191'],
             'desc'=>['required','string','min:3'],
             'email'=>['email'],
             'fio'=>['required','string','min:3', 'max:91'],
             'tlf'=>['sometimes']
        ];  }
       else  return[];
    }
}
