<?php

namespace Yadegar\Identities\App\Models;

use Yadegar\Base\App\Models\BaseModel;
use Yadegar\Base\App\Traits\HasDate;
use Yadegar\Services\App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property User[] $users
 * @property Permission[] $permissions
 */
class Role extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'name',
        'key',
    ];


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
