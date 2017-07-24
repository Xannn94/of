<?php

namespace App\Modules\Admin\Models;

use App\Facades\Route;
use App\Modules\Roles\Models\Modules;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use App\Modules\Roles\Models\Roles;
use Auth;

/**
 * App\Modules\Admin\Models\Admin
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin list()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable, Sortable;

    protected $table = "admins";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function canRead($slug)
    {
        $module = Modules::where('slug',$slug)->first();

        if($module){
            $permission = $this->role->permissions()->where('module_id',$module->id)->first();

            if($permission && $permission->read == 1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    public function canCreate()
    {
        $module = Modules::where('slug',Route::getModule())->first();

        if($module){
            $permission = $this->role->permissions()->where('module_id',$module->id)->first();

            if($permission && $permission->create == 1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    public function canDelete()
    {
        $module = Modules::where('slug',Route::getModule())->first();

        if($module){
            $permission = $this->role->permissions()->where('module_id',$module->id)->first();

            if($permission && $permission->delete == 1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    public function canUpdate()
    {
        $module = Modules::where('slug',Route::getModule())->first();

        if($module){
            $permission = $this->role->permissions()->where('module_id',$module->id)->first();

            if($permission && $permission->update == 1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    public function canPublish()
    {
        $module = Modules::where('slug',Route::getModule())->first();

        if($module){
            $permission = $this->role->permissions()->where('module_id',$module->id)->first();

            if($permission && $permission->publish == 1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }
}
