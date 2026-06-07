<?php

namespace Yadegar\Identities\App\Models;

use Yadegar\Base\App\Helpers\QueryBuilder;
use Yadegar\Base\App\Interfaces\IModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Base\App\Traits\HasEagerLoad;
use Yadegar\Base\App\Traits\HasFilter;
use Yadegar\Base\App\Traits\HasSearch;
use Yadegar\Base\App\Traits\HasSort;
use Yadegar\Filesystem\App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Memory\App\Models\Memory;


class Family extends BaseModel
{
    use HasDate, HasFilter, HasSort, HasSearch, HasEagerLoad;

    protected $table = 'user_families';

    protected $fillable = [
        'user_id',
        'member_id', 
        'name',
        'join_text',
        'status',
    ];



    public function member()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }


    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }


  
}
