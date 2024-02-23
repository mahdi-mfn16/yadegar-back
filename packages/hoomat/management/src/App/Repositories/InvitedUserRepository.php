<?php

namespace Hoomat\Management\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Management\App\Models\InvitedUser;
use Hoomat\Management\App\Repositories\Interfaces\InvitedUserRepositoryInterface;
use Hoomat\Management\App\Scopes\InvitedUser\InvitedUserFilterScope;
use Hoomat\Management\App\Scopes\InvitedUser\InvitedUserLoadScope;
use Hoomat\Management\App\Scopes\InvitedUser\InvitedUserSearchScope;
use Hoomat\Management\App\Scopes\InvitedUser\InvitedUserSortScope;

class InvitedUserRepository extends BaseRepository implements InvitedUserRepositoryInterface
{
    public function __construct(
        InvitedUser $model,
        InvitedUserFilterScope $filterScope,
        InvitedUserSortScope $sortScope,
        InvitedUserSearchScope $searchScope,
        InvitedUserLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
