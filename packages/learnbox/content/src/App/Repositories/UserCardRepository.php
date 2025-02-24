<?php

namespace Learnbox\Content\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Content\App\Models\UserCard;
use Learnbox\Content\App\Repositories\Interfaces\UserCardRepositoryInterface;
use Learnbox\Content\App\Scopes\UserCard\UserCardFilterScope;
use Learnbox\Content\App\Scopes\UserCard\UserCardLoadScope;
use Learnbox\Content\App\Scopes\UserCard\UserCardSearchScope;
use Learnbox\Content\App\Scopes\UserCard\UserCardSortScope;

class UserCardRepository extends BaseRepository implements UserCardRepositoryInterface
{
    public function __construct(
        UserCard $model,
        UserCardFilterScope $filterScope,
        UserCardSortScope $sortScope,
        UserCardSearchScope $searchScope,
        UserCardLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}