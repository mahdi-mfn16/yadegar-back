<?php

namespace Yadegar\Content\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Content\App\Models\Card;
use Yadegar\Content\App\Repositories\Interfaces\CardRepositoryInterface;
use Yadegar\Content\App\Scopes\Card\CardFilterScope;
use Yadegar\Content\App\Scopes\Card\CardLoadScope;
use Yadegar\Content\App\Scopes\Card\CardSearchScope;
use Yadegar\Content\App\Scopes\Card\CardSortScope;

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