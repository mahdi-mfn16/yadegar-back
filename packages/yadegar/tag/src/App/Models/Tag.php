<?php

namespace Yadegar\Tag\App\Models;

use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Base\App\Traits\HasEagerLoad;
use Yadegar\Base\App\Traits\HasFilter;
use Yadegar\Base\App\Traits\HasSearch;
use Yadegar\Base\App\Traits\HasSort;

/**
 * @property int $id
 */
class Tag extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad;

    protected $fillable = [
        'name'
    ];
}