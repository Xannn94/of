<?php
namespace App\Modules\Widgets\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Widgets\Models\Widget
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget list()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Widget extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query)
    {
        return $query->orderBy('slug', 'asc');
    }

    public function scopeList($query)
    {
        return $query->where('active', 1)->order();
    }
}
