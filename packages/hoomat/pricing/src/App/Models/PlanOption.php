<?php

namespace Hoomat\Pricing\App\Models;

use Hoomat\Base\App\Models\BaseModel;
use Hoomat\Base\App\Traits\HasDate;
use Hoomat\Base\App\Traits\HasEagerLoad;
use Hoomat\Base\App\Traits\HasFilter;
use Hoomat\Base\App\Traits\HasSearch;
use Hoomat\Base\App\Traits\HasSort;

/**
 * @property int $id
 */
class PlanOption extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad;

    protected $fillable = [
        'title',
    ];


    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_option_middle', 'plan_option_id', 'id');
    }
}