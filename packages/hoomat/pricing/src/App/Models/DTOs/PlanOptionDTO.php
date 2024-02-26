<?php

namespace Hoomat\Pricing\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class PlanOptionDTO extends BaseDTO
{
    public function __construct(
        public string $title
    )
    {
    }
}