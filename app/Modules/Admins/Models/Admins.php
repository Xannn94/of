<?php
namespace App\Modules\Admins\Models;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Model;

/**
 * App\Modules\Admins\Models\Admins
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Admins\Models\Admins whereUpdatedAt($value)
 */
class Admins extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){
        return $query;
    }
}
