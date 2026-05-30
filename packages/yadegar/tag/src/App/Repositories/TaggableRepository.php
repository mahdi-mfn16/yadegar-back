<?php

namespace Yadegar\Tag\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Tag\App\Models\Taggable;
use Yadegar\Tag\App\Repositories\Interfaces\TaggableRepositoryInterface;
use Yadegar\Tag\App\Scopes\Taggable\TaggableFilterScope;
use Yadegar\Tag\App\Scopes\Taggable\TaggableLoadScope;
use Yadegar\Tag\App\Scopes\Taggable\TaggableSearchScope;
use Yadegar\Tag\App\Scopes\Taggable\TaggableSortScope;

class TaggableRepository extends BaseRepository implements TaggableRepositoryInterface
{
    public function __construct(
        Taggable $model,
        TaggableFilterScope $filterScope,
        TaggableSortScope $sortScope,
        TaggableSearchScope $searchScope,
        TaggableLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}