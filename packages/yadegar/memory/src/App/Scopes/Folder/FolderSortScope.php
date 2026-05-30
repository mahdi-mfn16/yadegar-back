<?php

namespace Yadegar\Memory\App\Scopes\Folder;

use Yadegar\Base\App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Builder;

class FolderSortScope extends SortScope
{
    public function created_at($term): Builder
    {
        return $this->builder->orderBy('created_at', $term);
    }
}