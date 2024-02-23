<?php

namespace Hoomat\Management\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitedUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'access_level' => AccessLevelResource::make($this->whenLoaded('accessLevel')),
            'organization' => OrganizationResource::make($this->whenLoaded('organization')),
            'status' => $this->status,
        ];
    }
}
