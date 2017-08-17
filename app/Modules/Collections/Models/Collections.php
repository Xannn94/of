<?php
namespace App\Modules\Collections\Models;

use App\Models\Image;
use App\Models\Model;
use App\Modules\Products\Models\Products;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Modules\Collections\Models\Collections
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $on_main_top
 * @property int $on_main_bottom
 * @property int $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $image_full
 * @property-read mixed $image_mini
 * @property-read mixed $image_thumb
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Models\Products[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereOnMainBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereOnMainTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Collections\Models\Collections whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Collections extends Model
{
    use Notifiable, Sortable, Image;

    public function scopeOrder($query){
        return $query->orderBy('priority', 'desc')->orderBy('created_at', 'desc');
    }

    public function products(){
        return $this->hasMany(Products::class);
    }
}
