<?php

namespace Yadegar\Base\App\Models;

use Yadegar\Base\App\Helpers\QueryBuilder;
use Yadegar\Base\App\Interfaces\IModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Base\App\Traits\HasEagerLoad;
use Yadegar\Base\App\Traits\HasFilter;
use Yadegar\Base\App\Traits\HasSearch;
use Yadegar\Base\App\Traits\HasSort;
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
