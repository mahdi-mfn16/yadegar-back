<?php

namespace Yadegar\Learn\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Learn\App\Models\UserProgress;
use Yadegar\Learn\App\Repositories\Interfaces\UserProgressRepositoryInterface;
use Yadegar\Learn\App\Scopes\UserProgress\UserProgressFilterScope;
use Yadegar\Learn\App\Scopes\UserProgress\UserProgressLoadScope;
use Yadegar\Learn\App\Scopes\UserProgress\UserProgressSearchScope;
use Yadegar\Learn\App\Scopes\UserProgress\UserProgressSortScope;

class UserProgressRepository extends BaseRepository implements UserProgressRepositoryInterface
{
    public function __construct(
        UserProgress $model,
        UserProgressFilterScope $filterScope,
        UserProgressSortScope $sortScope,
        UserProgressSearchScope $searchScope,
        UserProgressLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}