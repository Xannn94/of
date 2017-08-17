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
 * @property int $id
 * @property string $lang
 * @property int $protected
 * @property int $active
 * @property string $type
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereProtected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Widgets\Models\Widget whereUpdatedAt($value)
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
