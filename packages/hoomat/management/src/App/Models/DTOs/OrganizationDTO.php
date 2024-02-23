<?php

namespace Hoomat\Management\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class OrganizationDTO extends BaseDTO
{
    public function __construct(
        public int $user_id,
        public string $title,
        public string $size
    )
    {
    }
}
