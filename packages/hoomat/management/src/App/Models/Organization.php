<?php

namespace Hoomat\Management\App\Models;

use Hoomat\Base\App\Models\BaseModel;
use Hoomat\Base\App\Traits\HasDate;
use Hoomat\Identities\App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'title',
        'user_id',
        'size'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function websites(): HasMany
    {
        return $this->hasMany(Website::class, 'organization_id', 'id');
    }


    public function invitedUsers(): HasMany
    {
        return $this->hasMany(InvitedUser::class, 'organization_id', 'id');
    }
}
