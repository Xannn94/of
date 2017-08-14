<?php
namespace App\Modules\Articles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image;
use App\Models\Filters;

/**
 * App\Modules\Articles\Models\Article
 *
 * @property-read mixed $image_full
 * @property-read mixed $image_mini
 * @property-read mixed $image_thumb
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Articles\Models\Article filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Articles\Models\Article order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Articles\Models\Article sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use Notifiable, Sortable, Image, Filters;

    public $filters = [
        'title'=> ['title', 'LIKE', '%?%']
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc');
    }
}
