<?php

namespace Yadegar\Identities\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->member->mobile,
            'status' => $this->status,
            'member_id' => $this->member_id,
        ];
    }
}
