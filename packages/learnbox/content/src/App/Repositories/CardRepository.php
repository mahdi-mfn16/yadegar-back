<?php

namespace Learnbox\Content\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Content\App\Models\Card;
use Learnbox\Content\App\Repositories\Interfaces\CardRepositoryInterface;
use Learnbox\Content\App\Scopes\Card\CardFilterScope;
use Learnbox\Content\App\Scopes\Card\CardLoadScope;
use Learnbox\Content\App\Scopes\Card\CardSearchScope;
use Learnbox\Content\App\Scopes\Card\CardSortScope;

class CardRepository extends BaseRepository implements CardRepositoryInterface
{
    public function __construct(
        Card $model,
        CardFilterScope $filterScope,
        CardSortScope $sortScope,
        CardSearchScope $searchScope,
        CardLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}