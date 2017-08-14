<?php
namespace App\Modules\News\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image;

/**
 * App\Modules\News\Models\News
 *
 * @property-read mixed $image_full
 * @property-read mixed $image_mini
 * @property-read mixed $image_thumb
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\News\Models\News order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\News\Models\News sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class News extends Model
{
    use Notifiable, Sortable, Image;

    public function scopeOrder($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
