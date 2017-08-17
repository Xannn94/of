<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Roles\Models\Modules
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Roles\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Roles\Models\Modules sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $slug
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Roles\Models\Modules whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Roles\Models\Modules whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Roles\Models\Modules whereTitle($value)
 */
class Modules extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
