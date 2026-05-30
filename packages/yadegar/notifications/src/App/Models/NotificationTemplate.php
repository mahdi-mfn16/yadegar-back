<?php

namespace Yadegar\Notifications\App\Models;

use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Base\App\Traits\HasDate;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property ?string $name
 * @property ?string $receiver_type
 * @property ?string $text
 * @property ?string $params
 * @property ?string $type
 * @property Notification[]|Collection $notifications
 */
class NotificationTemplate extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'name',
        'receiver_type',
        'text',
        'params',
        'type'
    ];


    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'template_id', 'id');
    }
}
