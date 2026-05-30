<?php

namespace Yadegar\Memory\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yadegar\Identities\App\Http\Resources\UserResource;

use function PHPSTORM_META\map;

class MemoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'visibility' => $this->visibility,
            'date' => $this->date,
            'location' => $this->location,
            'text' => $this->text,
            'photo' => $this->getFile('photo'),
            'audio' => $this->getFile('audio'),
            'video' => $this->getFile('video'),
            'user' => UserResource::make($this->whenLoaded('user')),
            'folder' => FolderResource::make($this->whenLoaded('folder')),
        ];
    }
}