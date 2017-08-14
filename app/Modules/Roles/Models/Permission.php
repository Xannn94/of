<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Roles\Models\Permission
 *
 * @property-read \App\Modules\Roles\Models\Modules $module
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Roles\Models\Roles[] $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Roles\Models\Permission sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function role()
    {
        return $this->belongsToMany(Roles::class,'permission_roles');
    }

    public function module()
    {
        return $this->hasOne(Modules::class, 'id', 'module_id');
    }
}
