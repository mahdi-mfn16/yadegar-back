<?php

namespace Learnbox\Filesystem\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Filesystem\App\Models\File;
use Learnbox\Filesystem\App\Repositories\Interfaces\FileRepositoryInterface;
use Learnbox\Filesystem\App\Scopes\FileFilterScope;
use Learnbox\Filesystem\App\Scopes\FileLoadScope;
use Learnbox\Filesystem\App\Scopes\FileSearchScope;
use Learnbox\Filesystem\App\Scopes\FileSortScope;
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
