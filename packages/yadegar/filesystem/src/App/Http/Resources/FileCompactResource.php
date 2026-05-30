<?php

namespace Yadegar\Filesystem\App\Http\Resources;

use Yadegar\Identities\App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FileCompactResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alt' => $this->alt,
            'file' => config('app.cdn_url').'/'.$this->path,    
        ];
    }
}
