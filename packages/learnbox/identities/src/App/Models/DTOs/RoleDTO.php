<?php

namespace Learnbox\Identities\App\Models\DTOs;

use Learnbox\Base\App\Models\BaseDTO;

class RoleDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $key
        )
    {}
}
