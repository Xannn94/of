<?php

namespace App\Modules\Feedback\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Feedback\Models\Feedback;
use App\Modules\Settings\Facades\Settings;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Mail;

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

        Mail::send(
            'feedback::email',
            [ 'data' => $arr ],
            function ($message) {
                $emails = explode(',', Settings::get('feedback_email'));
                $message
                    ->to($emails)
                    ->from('xannn94@mail.ru', 'of')
                    ->subject('У вас новое сообщение');
            }
        );

        $this->getModel()->create($arr);

        return redirect()->back()->with(
            'message', 'Ваше сообщение успешно отправлено.'
        );
    }

    public function getRules($request)
    {
        return [
            'name'      => 'required|max:255',
            'email'     => 'required|email',
            'phone'     => 'required',
            'message'   => 'required',
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