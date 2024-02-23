<?php

namespace Hoomat\Management\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class InvitedUserDTO extends BaseDTO
{
    public function __construct(
        public string $email,
        public int $organization_id,
        public int $access_level_id,
        public ?int $status
    )
    {}
}
