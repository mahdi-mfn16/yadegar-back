<?php

namespace Yadegar\Content\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Content\App\Models\UserCard;
use Yadegar\Content\App\Repositories\Interfaces\UserCardRepositoryInterface;
use Yadegar\Content\App\Scopes\UserCard\UserCardFilterScope;
use Yadegar\Content\App\Scopes\UserCard\UserCardLoadScope;
use Yadegar\Content\App\Scopes\UserCard\UserCardSearchScope;
use Yadegar\Content\App\Scopes\UserCard\UserCardSortScope;

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