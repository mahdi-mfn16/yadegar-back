<?php

namespace Yadegar\Memory\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yadegar\Identities\App\Http\Resources\UserResource;

class FolderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user' => UserResource::make($this->whenLoaded('user')),
            'memories' => MemoryResource::collection($this->whenLoaded('memories')),
        ];
    }
}