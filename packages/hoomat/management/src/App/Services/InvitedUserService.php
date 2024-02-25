<?php

namespace Hoomat\Management\App\Services;

use Hoomat\Base\App\Services\BaseService;
use Hoomat\Management\App\Models\DTOs\InvitedUserDTO;
use Hoomat\Management\App\Models\InvitedUser;
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


    public function createInvitedUser($request)
    {
        $data = $request->all();
        $invitedUser = $this->repository->updateOrCreateOne(
            [
                'email' => $data['email'],
                'organization_id' => $data['organization_id'],
            ],
            InvitedUserDTO::fromArray($data)
        );
        
        $this->sendInvite($invitedUser);

        return $invitedUser;
    }



    public function sendInvite($invitedUser)
    {
        // send invitation email
    }
}
