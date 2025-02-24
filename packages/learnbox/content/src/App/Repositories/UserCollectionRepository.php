<?php

namespace Learnbox\Content\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Content\App\Models\UserCollection;
use Learnbox\Content\App\Repositories\Interfaces\UserCollectionRepositoryInterface;
use Learnbox\Content\App\Scopes\UserCollection\UserCollectionFilterScope;
use Learnbox\Content\App\Scopes\UserCollection\UserCollectionLoadScope;
use Learnbox\Content\App\Scopes\UserCollection\UserCollectionSearchScope;
use Learnbox\Content\App\Scopes\UserCollection\UserCollectionSortScope;

class UserCollectionRepository extends BaseRepository implements UserCollectionRepositoryInterface
{
    public function __construct(
        UserCollection $model,
        UserCollectionFilterScope $filterScope,
        UserCollectionSortScope $sortScope,
        UserCollectionSearchScope $searchScope,
        UserCollectionLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}