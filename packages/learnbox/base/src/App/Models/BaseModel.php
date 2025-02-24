<?php

namespace Learnbox\Base\App\Models;

use Learnbox\Base\App\Helpers\QueryBuilder;
use Learnbox\Base\App\Interfaces\IModel;
use Learnbox\Base\App\Traits\HasDate;
use Learnbox\Base\App\Traits\HasEagerLoad;
use Learnbox\Base\App\Traits\HasFilter;
use Learnbox\Base\App\Traits\HasSearch;
use Learnbox\Base\App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model implements IModel
{
    use HasDate, HasFilter, HasSort, HasEagerLoad, HasSearch;


    public function newEloquentBuilder($query)
    {
        return new QueryBuilder($query);
    }


    public function getCacheTags(): array
    {
        return $this->cache_tags ?? [];
    }
}
