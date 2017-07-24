<?php
namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Tree\Helpers\Breadcrumbs;
use App\Modules\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Modules\Users\Mail\UserRegistered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    public function getModel()
    {

    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getMessagesRules(){
        return [
            'name.required' => 'Поле Имя обязательно для заполнения',
            'name.max' => 'Поле Имя не может быть длинее 255 символов',
            'surname.required' => 'Поле Фамилия обязательно для заполнения',
            'surname.max' => 'Поле Фамилия не может быть длинее 255 символов',
            'email.required' => 'Поле E-mail обязательно для заполнения',
            'email.email' => 'Не корректный E-mail',
            'email.max' => 'Поле E-mail не может быть длинее 255 символов',
            'email.unique' => 'Пользователь с таким E-mail уже существует',
            'password.required' => 'Поле Пароль обязательно для заполнения',
            'password.min' => 'Пароль должен быть больше 6 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'captcha.required'   => 'Поле Капча обязательно для заполнения',
            'captcha.captcha'   => 'Ваши данные не совпадают с картинкой',

        ];
    }

    public function getRules(){
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'captcha'   => 'required|captcha',
        ];
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->getRules(),$this->getMessagesRules());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        Breadcrumbs::add('Главная', home());
        Breadcrumbs::add('Регистрация', route('user.register'));

        return view('users::auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = User::create($request->all());

        Mail::to($user)->send(new UserRegistered($user,$request->get('password')));

        $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');

        return redirect()->back();
    }

    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();

        $request->session()->flash('message', 'Учетная запись подтверждена. Войдите под своим именем.');

        return redirect('/register');
    }
}