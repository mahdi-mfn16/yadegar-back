<?php

namespace Yadegar\Learn\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Learn\App\Models\Box;
use Yadegar\Learn\App\Repositories\Interfaces\BoxRepositoryInterface;
use Yadegar\Learn\App\Scopes\Box\BoxFilterScope;
use Yadegar\Learn\App\Scopes\Box\BoxLoadScope;
use Yadegar\Learn\App\Scopes\Box\BoxSearchScope;
use Yadegar\Learn\App\Scopes\Box\BoxSortScope;

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