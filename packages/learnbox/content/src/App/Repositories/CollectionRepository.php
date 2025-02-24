<?php

namespace Learnbox\Content\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Content\App\Models\Collection;
use Learnbox\Content\App\Repositories\Interfaces\CollectionRepositoryInterface;
use Learnbox\Content\App\Scopes\Collection\CollectionFilterScope;
use Learnbox\Content\App\Scopes\Collection\CollectionLoadScope;
use Learnbox\Content\App\Scopes\Collection\CollectionSearchScope;
use Learnbox\Content\App\Scopes\Collection\CollectionSortScope;

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