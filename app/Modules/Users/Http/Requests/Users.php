<?php

namespace App\Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Users extends FormRequest
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
        //охренеть!!! это ID текущего роута. Но он называется не ID, а как сущность контроллера без s
        //dd($this->admin);

        $rules = [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users'.($this->admin?',id,'.$this->admin:''),
            'password'  => 'required|min:6'
        ];

        if (isset($this->password) && !$this->password){
            unset($this->password);
            unset($rules['password']);
        }

        return $rules;
    }
}
