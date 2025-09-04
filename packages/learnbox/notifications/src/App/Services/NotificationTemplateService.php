<?php

namespace Yadegar\Notifications\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;

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
