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
class Plan extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad;

    protected $fillable = [
        'name',
        'title',
        'monthly_price',
        'annual_price',
        'status',
    ];

    public function options()
    {
        return $this->belongsToMany(PlanOption::class, 'plan_option_middle', 'plan_id', 'id');
    }
}