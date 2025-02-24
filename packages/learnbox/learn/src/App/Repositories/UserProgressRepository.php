<?php

namespace Learnbox\Learn\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Learn\App\Models\UserProgress;
use Learnbox\Learn\App\Repositories\Interfaces\UserProgressRepositoryInterface;
use Learnbox\Learn\App\Scopes\UserProgress\UserProgressFilterScope;
use Learnbox\Learn\App\Scopes\UserProgress\UserProgressLoadScope;
use Learnbox\Learn\App\Scopes\UserProgress\UserProgressSearchScope;
use Learnbox\Learn\App\Scopes\UserProgress\UserProgressSortScope;

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