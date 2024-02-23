<?php

namespace Hoomat\Management\App\Models;

use Hoomat\Base\App\Models\BaseModel;
use Hoomat\Base\App\Traits\HasDate;
use Hoomat\Pricing\App\Models\Plan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Website extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'title',
        'domain',
        'organization_id',
        'industry_id',
        'plan_id',
        'plan_expired_at',
        'status',

    ];


    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }


    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

}
