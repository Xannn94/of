<?php

namespace App\Modules\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use App\Modules\Users\Mail\UserReset;

/**
 * App\Modules\Users\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Models\User admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Models\User filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Models\User list()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Models\User order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Models\User sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        if ($password){
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function scopeAdmin($query)
    {
        return $query->filtered()->order();
    }

    public function scopeFiltered($query)
    {
        return $query;
    }

    public function scopeList($query)
    {
        return $query->filtered()->order();
    }

    public function scopeOrder($query)
    {
        return $query;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }

    public function confirmEmail()
    {
        $this->verified = true;
        $this->token    = null;

        $this->save();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserReset($token));
    }
}
