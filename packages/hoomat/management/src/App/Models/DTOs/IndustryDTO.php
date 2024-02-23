<?php

namespace Hoomat\Management\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class IndustryDTO extends BaseDTO
{
    public function __construct(
        public string $title
    )
    {}
}
