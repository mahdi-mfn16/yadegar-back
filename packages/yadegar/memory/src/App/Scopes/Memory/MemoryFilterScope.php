<?php

namespace Yadegar\Memory\App\Scopes\Memory;

use Yadegar\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class MemoryFilterScope extends FilterScope
{
    public function user($term): Builder
    {
        return $this->builder->where('user_id', $term);
    }

    public function visibility(array $term): Builder
    {
        return $this->builder->whereIn('visibility', $term);
    }

    public function family($term): Builder
    {
        return $this->builder->whereHas('user_id', auth('sanctum')->user()->member_ids);
    }



    public function folder($term): Builder
    {
        return $this->builder->where('folder_id', $term);
    }


    public function not_own($term): Builder
    {
        return $this->builder->where('user_id', '!=', auth('sanctum')->id());
    }
}