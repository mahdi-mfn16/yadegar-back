<?php

namespace Yadegar\Memory\App\Models\DTOs;

use Yadegar\Base\App\Models\BaseDTO;

class MemoryDTO extends BaseDTO
{
    public function __construct(
        public string $visibility,
        public ?int $user_id,
        public ?int $folder_id,
        public ?string $title,
        public ?string $text,
        public ?string $location,
        public mixed $date
    )
    {
        $this->user_id = auth('sanctum')->id();
        $this->date = isset($date) ? $date : now();
    }
}