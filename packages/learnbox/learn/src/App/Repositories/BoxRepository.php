<?php

namespace Learnbox\Learn\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Learn\App\Models\Box;
use Learnbox\Learn\App\Repositories\Interfaces\BoxRepositoryInterface;
use Learnbox\Learn\App\Scopes\Box\BoxFilterScope;
use Learnbox\Learn\App\Scopes\Box\BoxLoadScope;
use Learnbox\Learn\App\Scopes\Box\BoxSearchScope;
use Learnbox\Learn\App\Scopes\Box\BoxSortScope;

class BoxRepository extends BaseRepository implements BoxRepositoryInterface
{
    public function __construct(
        Box $model,
        BoxFilterScope $filterScope,
        BoxSortScope $sortScope,
        BoxSearchScope $searchScope,
        BoxLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}