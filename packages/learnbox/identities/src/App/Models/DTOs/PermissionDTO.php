<?php

namespace Yadegar\Identities\App\Models\DTOs;

use Yadegar\Base\App\Models\BaseDTO;

class PermissionDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $key
    )
    {}
}
