<?php

namespace App\Modules\Users\Mail;

use App\Modules\Widgets\Facades\Widget;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Modules\Users\Models\User;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct(User $user,$password)
    {
        $this->user     = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))
            ->subject(trans('users::auth.confirm_subject') . config('app,name'))
            ->view('users::emails.confirm');
    }
}
