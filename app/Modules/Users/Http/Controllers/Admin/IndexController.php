<?php

namespace App\Modules\Users\Http\Controllers\Admin;

use  App\Modules\Users\Models\User;


use App\Modules\Admin\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

class IndexController extends Admin
{
    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'users';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'users';

    public function getModel()
    {
        return new User;
    }

    public function getRules($request, $id = false)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'.($id?',id,'.$id:''),
            'password' => 'required|min:6'
        ];

        if (isset($request->password) && !$request->password){
            unset($request->password);
            unset($rules['password']);
        }

        return $rules;
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id){
            abort(403);
        }

        return parent::destroy($id);
    }
}
