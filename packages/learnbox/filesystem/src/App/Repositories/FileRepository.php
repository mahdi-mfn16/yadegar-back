<?php

namespace Yadegar\Filesystem\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Filesystem\App\Models\File;
use Yadegar\Filesystem\App\Repositories\Interfaces\FileRepositoryInterface;
use Yadegar\Filesystem\App\Scopes\FileFilterScope;
use Yadegar\Filesystem\App\Scopes\FileLoadScope;
use Yadegar\Filesystem\App\Scopes\FileSearchScope;
use Yadegar\Filesystem\App\Scopes\FileSortScope;
use Illuminate\Database\Eloquent\Collection;

class FileRepository extends BaseRepository implements FileRepositoryInterface
{
    public function __construct(
        File            $model,
        FileFilterScope $filterScope,
        FileSortScope   $sortScope,
        FileSearchScope $searchScope,
        FileLoadScope   $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }


    public function groupByOn($field, $where): Collection|array
    {
        $fields = is_array($field) ? $field : [$field];
        return $this->model->query()
            ->select($fields)
            ->groupBy($fields)
            ->where($where)
            ->get();
    }
}
