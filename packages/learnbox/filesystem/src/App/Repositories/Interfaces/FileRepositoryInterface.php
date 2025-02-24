<?php

namespace Learnbox\Filesystem\App\Repositories\Interfaces;

use Learnbox\Base\App\Repositories\Interfaces\EloquentRepositoryInterface;
use Learnbox\Filesystem\App\Models\File;

interface FileRepositoryInterface extends EloquentRepositoryInterface
{
    public function groupByOn($field, $where);
}
