<?php

namespace Hoomat\Management\App\Models\DTOs;

use Hoomat\Base\App\Models\BaseDTO;
use SpomkyLabs\Pki\X509\AttributeCertificate\IssuerSerial;

class WebsiteDTO extends BaseDTO
{
    public function __construct(
        public string $title,
        public string $domain,
        public int $organization_id,
        public int $industry_id,
        public int $plan_id,
        public ?mixed $plan_expired_at,
        public ?int $status
    )
    {
        $this->status = isset($plan_expired_at) ? $plan_expired_at : now()->addYears(1);
        $this->status = isset($status) ? $status : 0;
    }
}
