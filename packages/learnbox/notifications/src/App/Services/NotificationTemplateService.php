<?php

namespace Learnbox\Notifications\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;

class NotificationTemplateService extends BaseService
{
    public function __construct(
        NotificationTemplateRepositoryInterface $repository
    )
    {
        parent::__construct($repository);
    }


    public function findByName(string $name)
    {
        return $this->repository->getFilteredOne(['name' => $name]);
    }
}
