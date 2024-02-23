<?php

namespace Hoomat\Management\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;

class WebsiteDTO extends BaseDTO
{
    public function __construct(
        public string $title,
        public string $domain,
        public int $organization_id,
        public int $industry_id,
        public int $plan_id,
        public ?mixed $plan_expired_at,
        public int $status
    )
    {}
}
