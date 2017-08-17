<?php
namespace App\Modules\Products\Models;

use App\Models\Model;
use App\Modules\Collections\Models\Collections;
use App\Modules\Colors\Models\Colors;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Modules\Products\Models\Products
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Modules\Collections\Models\Collections $collection
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Products\Models\Products order()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Products\Models\Products sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Products\Models\Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Products\Models\Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Products\Models\Products whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Products extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){
        return $query;
    }

    public function collection(){
        return $this->belongsTo(Collections::class);
    }

    public function colors(){
        return $this->belongsToMany(Colors::class);
    }
}
