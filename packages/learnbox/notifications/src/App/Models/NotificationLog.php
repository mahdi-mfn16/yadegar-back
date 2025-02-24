<?php

namespace Learnbox\Notifications\App\Models;

use Learnbox\Base\App\Models\BaseModel;
use Learnbox\Base\App\Traits\HasDate;
use Learnbox\Identities\App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $notification_id
 * @property int $receiver_id
 * @property int $status - 1: pending, 2: canceled, 3: sent, 4: failed
 * @property mixed $read_at
 * @property User $receiver
 * @property Notification $notification
 */
class NotificationLog extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'notification_id',
        'receiver_id',
        'status',
        'read_at'
    ];


    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }


    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
