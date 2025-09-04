<?php

namespace Yadegar\Content\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Content\App\Models\UserCollection;
use Yadegar\Content\App\Repositories\Interfaces\UserCollectionRepositoryInterface;
use Yadegar\Content\App\Scopes\UserCollection\UserCollectionFilterScope;
use Yadegar\Content\App\Scopes\UserCollection\UserCollectionLoadScope;
use Yadegar\Content\App\Scopes\UserCollection\UserCollectionSearchScope;
use Yadegar\Content\App\Scopes\UserCollection\UserCollectionSortScope;

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