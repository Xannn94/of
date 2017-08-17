<?php

namespace App\Modules\Sliders\Models;

use App\Models\Model;
use App\Models\Image as Img;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Sliders\Models\Sliders
 *
 * @property int $id
 * @property string $title
 * @property string $title_color
 * @property string $background_button
 * @property string $color_button
 * @property string $preview
 * @property string $link
 * @property string $link_type
 * @property string $image
 * @property int $priority
 * @property int $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $image_full
 * @property-read mixed $image_mini
 * @property-read mixed $image_thumb
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereBackgroundButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereColorButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereTitleColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Sliders\Models\Sliders whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sliders extends Model
{
    use Notifiable, Sortable, Img;

    protected $guarded = array('id', 'created_at', 'updated_at');

    protected $fillable = [
        'title',
        'title_color',
        'preview',
        'color_button',
        'background_button',
        'link',
        'link_type',
        'priority',
        'active'
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('priority', 'desc')->orderBy('created_at', 'desc');
    }
}