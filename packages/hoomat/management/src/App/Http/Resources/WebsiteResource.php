<?php

namespace Hoomat\Management\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'domain' => $this->domain,
            'organization' => OrganizationResource::make($this->whenLoaded('organization')),
            'industry' => IndustryResource::make($this->whenLoaded('industry')),
            'plan' => PlanResource::make($this->whenLoaded('plan')),
            'plan_expired_at' => $this->plan_expired_at,
            'status' => $this->status,
           
        ];
    }
}
