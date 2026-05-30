<?php

namespace Yadegar\Memory\App\Models;

use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Base\App\Traits\HasEagerLoad;
use Yadegar\Base\App\Traits\HasFilter;
use Yadegar\Base\App\Traits\HasSearch;
use Yadegar\Base\App\Traits\HasSort;
use Yadegar\Filesystem\App\Traits\HasFile;
use Yadegar\Identities\App\Models\User;
use Yadegar\Tag\App\Models\Tag;

/**
 * @property int $id
 */
class Memory extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad, HasFile;

    protected $fillable = [
        'user_id',
        'folder_id',
        'title',
        'text',
        'date',
        'location',
        'visibility', 
        // private: فقط خودم
        // family: خودم و خانواده
        // public: همه با نام من
        // anonymous: همه بدون نام من
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id', 'id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'to', 'taggables');
    }

}
