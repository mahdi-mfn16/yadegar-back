<?php

namespace Yadegar\Filesystem\App\Repositories\Interfaces;

use Yadegar\Base\App\Repositories\Interfaces\EloquentRepositoryInterface;
use Yadegar\Filesystem\App\Models\File;

interface FileRepositoryInterface extends EloquentRepositoryInterface
{
    public function groupByOn($field, $where);
}
