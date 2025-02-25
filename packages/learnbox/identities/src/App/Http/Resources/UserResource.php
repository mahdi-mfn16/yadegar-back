<?php

namespace Learnbox\Identities\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'national_code' => $this->national_code,
            'gender' => $this->gender,
            'role'=> RoleResource::make($this->whenLoaded('role')),
            // 'avatar' => $this->getFileUrl('avatar'),
        ];
    }
}
