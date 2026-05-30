<?php

namespace Yadegar\Memory\App\Models\DTOs;

use Yadegar\Base\App\Models\BaseDTO;

class FolderDTO extends BaseDTO
{
    public function __construct(
        public ?int $user_id,
        public string $title,
        public ?string $description
    )
    {
        $this->user_id = auth('sanctum')->id();
    }
}