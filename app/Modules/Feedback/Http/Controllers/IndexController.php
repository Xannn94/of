<?php

namespace App\Modules\Feedback\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Feedback\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class IndexController extends Controller
{
    use ValidatesRequests;

    public function index(){
        return view('feedback::index');
    }

    public function store(Request $request){
        $this->validate($request, $this->getRules($request), $this->getMessages());

        $arr            = $request->all();
        $arr['ip']      = ip2long($request->ip());
        $arr['date']    = date('Y-m-d H:i:s');

        $this->getModel()->create($arr);

        return redirect()->back()->with(
            'message', 'Ваше сообщение успешно отправлено. Наши менеджеры свяжуться с вами в ближайшее время.'
        );
    }

    public function getRules($request)
    {
        return [
            'name'      => 'required|max:255',
            'email'     => 'required|email',
            'captcha'   => 'required|captcha'
        ];
    }

    public function getMessages(){
        return [
            'required'  => 'Это поле обязательно для заполнения',
            'email'     => 'Укажите корректный электронный адрес'
        ];
    }

    public function getModel()
    {
        return new Feedback();
    }
}