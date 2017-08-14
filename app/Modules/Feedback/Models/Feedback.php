<?php
namespace App\Modules\Feedback\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Feedback\Models\Feedback
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Feedback extends Model
{
    use Notifiable, Sortable;

    protected $fillable = [
        'date','email', 'name', 'message', 'ip'
    ];

    public function imagePrefixPath()
    {
        return '/uploads/reviews/';
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
