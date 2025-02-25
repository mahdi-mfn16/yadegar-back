<?php

namespace Learnbox\Identities\App\Models;

use Learnbox\Base\App\Helpers\QueryBuilder;
use Learnbox\Base\App\Interfaces\IModel;
use Learnbox\Base\App\Traits\HasDate;
use Learnbox\Base\App\Traits\HasEagerLoad;
use Learnbox\Base\App\Traits\HasFilter;
use Learnbox\Base\App\Traits\HasSearch;
use Learnbox\Base\App\Traits\HasSort;
use Learnbox\Filesystem\App\Traits\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
  
}
