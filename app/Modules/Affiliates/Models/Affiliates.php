<?php
namespace App\Modules\Affiliates\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Affiliates\Models\Affiliates
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Affiliates\Models\Affiliates order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Affiliates\Models\Affiliates sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Affiliates extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query)
    {
        return $query->orderBy('priority','desc')->orderBy('created_at','desc');
    }
}
