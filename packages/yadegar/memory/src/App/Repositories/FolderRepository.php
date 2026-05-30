<?php

namespace Yadegar\Memory\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Memory\App\Models\Folder;
use Yadegar\Memory\App\Repositories\Interfaces\FolderRepositoryInterface;
use Yadegar\Memory\App\Scopes\Folder\FolderFilterScope;
use Yadegar\Memory\App\Scopes\Folder\FolderLoadScope;
use Yadegar\Memory\App\Scopes\Folder\FolderSearchScope;
use Yadegar\Memory\App\Scopes\Folder\FolderSortScope;

class FolderRepository extends BaseRepository implements FolderRepositoryInterface
{
    public function __construct(
        Folder $model,
        FolderFilterScope $filterScope,
        FolderSortScope $sortScope,
        FolderSearchScope $searchScope,
        FolderLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}