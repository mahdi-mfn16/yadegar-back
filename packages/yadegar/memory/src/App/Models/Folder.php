<?php

namespace Yadegar\Memory\App\Models;

use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Base\App\Traits\HasEagerLoad;
use Yadegar\Base\App\Traits\HasFilter;
use Yadegar\Base\App\Traits\HasSearch;
use Yadegar\Base\App\Traits\HasSort;
use Yadegar\Identities\App\Models\User;

/**
 * @property int $id
 */
class Folder extends BaseModel
{
    use HasDate, HasFilter, HasSearch, HasSort, HasEagerLoad;

    protected $fillable = [
        'user_id',
        'title',
        'description',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function memories()
    {
        return $this->hasMany(Memory::class, 'folder_id', 'id');
    }
}