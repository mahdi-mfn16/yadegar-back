<?php

namespace Learnbox\Content\App\Models;

use Learnbox\Base\App\Models\BaseModel;
use Learnbox\Base\App\Traits\HasDate;
use Learnbox\Base\App\Traits\HasEagerLoad;
use Learnbox\Base\App\Traits\HasFilter;
use Learnbox\Base\App\Traits\HasSearch;
use Learnbox\Base\App\Traits\HasSort;

/**
 * @property int $id
 */
class UserCard extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad;

    protected $fillable = [];
}