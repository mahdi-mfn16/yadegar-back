<?php

namespace Yadegar\Content\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Content\App\Repositories\Interfaces\CardRepositoryInterface;

class CardService extends BaseService
{
    public function __construct(CardRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}