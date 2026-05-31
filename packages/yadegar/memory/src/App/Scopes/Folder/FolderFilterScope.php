<?php

namespace Yadegar\Memory\App\Scopes\Folder;

use Yadegar\Base\App\Scopes\FilterScope;
use Illuminate\Database\Eloquent\Builder;

class FolderFilterScope extends FilterScope
{
    public function user($term): Builder
    {
        return $this->builder->where('user_id', $term);
    }

}