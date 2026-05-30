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
use Yadegar\Memory\App\Models\Memory;

/**
 * @property int $id
 * @property ?string $name
 * @property ?string $username has @
 * @property ?string $email
 * @property ?string $mobile
 * @property ?int $role_id
 * @property ?string $national_code
 * @property mixed $birth_date
 * @property bool $gender - 0 for female, 1 for male, there is no number 2 :)
 * @property ?string $full_name
 */
class User extends Authenticatable implements IModel
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasDate, HasFile, HasFilter, HasSort, HasSearch, HasEagerLoad;

    protected $fillable = [
        'name',
        'username', 
        'email',
        'mobile',
        'role_id',
        'national_code',
        'birth_date',
        'gender',
        'google_id',
        'code',
    ];


    public function newEloquentBuilder($query)
    {
        return new QueryBuilder($query);
    }


    public function getCacheTags(): array
    {
        return $this->cache_tags ?? [];
    }



    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }


    public function memories()
    {
        return $this->hasMany(Memory::class, 'user_id', 'id');
    }


    public function folders()
    {
        return $this->hasMany(Memory::class, 'user_id', 'id');
    }
  
}
