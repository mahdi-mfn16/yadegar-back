<?php

namespace Hoomat\Management\App\Models;

use Hoomat\Base\App\Models\BaseModel;
use Hoomat\Base\App\Traits\HasDate;
use Hoomat\Identities\App\Models\AccessLevel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitedUser extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'email',
        'organization_id',
        'access_level_id',
        'status',
    ];



    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }


    public function accessLevel(): BelongsTo
    {
        return $this->belongsTo(AccessLevel::class, 'access_level_id', 'id');
    }


   


}
