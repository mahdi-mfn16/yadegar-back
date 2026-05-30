<?php

namespace Yadegar\Memory\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Memory\App\Models\Memory;
use Yadegar\Memory\App\Repositories\Interfaces\MemoryRepositoryInterface;
use Yadegar\Memory\App\Scopes\Memory\MemoryFilterScope;
use Yadegar\Memory\App\Scopes\Memory\MemoryLoadScope;
use Yadegar\Memory\App\Scopes\Memory\MemorySearchScope;
use Yadegar\Memory\App\Scopes\Memory\MemorySortScope;

class MemoryRepository extends BaseRepository implements MemoryRepositoryInterface
{
    public function __construct(
        Memory $model,
        MemoryFilterScope $filterScope,
        MemorySortScope $sortScope,
        MemorySearchScope $searchScope,
        MemoryLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}