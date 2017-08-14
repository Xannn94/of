<?php
namespace App\Modules\Regions\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Regions\Models\Regions
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Regions\Models\Regions order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Regions\Models\Regions sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Regions extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){
        return $query->orderBy('priority','desc');
    }
}
