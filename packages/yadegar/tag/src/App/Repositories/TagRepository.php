<?php

namespace Yadegar\Tag\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Tag\App\Models\Tag;
use Yadegar\Tag\App\Repositories\Interfaces\TagRepositoryInterface;
use Yadegar\Tag\App\Scopes\Tag\TagFilterScope;
use Yadegar\Tag\App\Scopes\Tag\TagLoadScope;
use Yadegar\Tag\App\Scopes\Tag\TagSearchScope;
use Yadegar\Tag\App\Scopes\Tag\TagSortScope;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function __construct(
        Tag $model,
        TagFilterScope $filterScope,
        TagSortScope $sortScope,
        TagSearchScope $searchScope,
        TagLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}