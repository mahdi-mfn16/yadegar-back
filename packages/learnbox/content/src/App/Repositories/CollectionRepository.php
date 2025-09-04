<?php

namespace Yadegar\Content\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Content\App\Models\Collection;
use Yadegar\Content\App\Repositories\Interfaces\CollectionRepositoryInterface;
use Yadegar\Content\App\Scopes\Collection\CollectionFilterScope;
use Yadegar\Content\App\Scopes\Collection\CollectionLoadScope;
use Yadegar\Content\App\Scopes\Collection\CollectionSearchScope;
use Yadegar\Content\App\Scopes\Collection\CollectionSortScope;

class CollectionRepository extends BaseRepository implements CollectionRepositoryInterface
{
    public function __construct(
        Collection $model,
        CollectionFilterScope $filterScope,
        CollectionSortScope $sortScope,
        CollectionSearchScope $searchScope,
        CollectionLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}