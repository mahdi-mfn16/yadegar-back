<?php

namespace Learnbox\Content\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Content\App\Repositories\Interfaces\CardRepositoryInterface;

class CardService extends BaseService
{
    public function __construct(CardRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}