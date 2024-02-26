<?php

namespace Hoomat\Pricing\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class PlanDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $title,
        public float $monthly_price,
        public float $annual_price,
        public ?int $status
    )
    {
        $this->status = isset($status) ? $status : 1;
    }
}