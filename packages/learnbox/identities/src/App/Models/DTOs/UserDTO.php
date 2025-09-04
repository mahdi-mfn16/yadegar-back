<?php

namespace Yadegar\Identities\App\Models\DTOs;

use Yadegar\Base\App\Models\BaseDTO;

class UserDTO extends BaseDTO
{
    public function __construct(
        public ?int $role_id = null,
        public ?string $name = null,
        public ?string $username = null,
        public ?string $email = null,
        public ?string $mobile = null,
        public ?string $national_code = null,
        public ?string $google_id = null,
        public mixed $birth_date = null,
        public bool $gender = true,
    )
    {}
}
