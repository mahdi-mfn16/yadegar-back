<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Repositories\Interfaces\InvitedUserRepositoryInterface;

class InvitedUserService extends BaseService
{
    public function __construct(InvitedUserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }


    public function getInvitedUsers()
    {
        return $this->repository->get();
    }
}
