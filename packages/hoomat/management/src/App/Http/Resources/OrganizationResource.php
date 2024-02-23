<?php

namespace Hoomat\Management\App\Http\Resources;

use Hoomat\Identities\App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'size' => $this->size,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
