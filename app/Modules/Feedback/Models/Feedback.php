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
 * @property int $id
 * @property string $lang
 * @property string $date
 * @property int $ip
 * @property string $name
 * @property string $email
 * @property string $message
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Feedback\Models\Feedback whereUpdatedAt($value)
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
