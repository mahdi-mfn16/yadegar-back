<?php

namespace Yadegar\Filesystem\App\Traits;

use Yadegar\Filesystem\App\Models\File;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Yadegar\Filesystem\App\Http\Resources\FileCompactResource;

trait HasFile
{
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }


    public function getFileUrl($type): string
    {
        $file = $this->files->where('type', $type)->first();

        return $file ? config('app.cdn_url').'/'.$file->path : '';
    }


    public function getFile($type)
    {
        $file = $this->files->where('type', $type)->first();
        return $file ? FileCompactResource::make($file) : null;
    }
}
