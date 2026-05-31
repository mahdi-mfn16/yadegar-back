<?php

namespace Yadegar\Memory\App\Scopes\Folder;

use Yadegar\Base\App\Scopes\EagerLoadScope;
use Illuminate\Database\Eloquent\Builder;

class FolderLoadScope extends EagerLoadScope
{

    public function memories(): Builder
    {
        return $this->builder->with(['memories' => function($q){
            $q->with(['files']);
        }]);
    }
}