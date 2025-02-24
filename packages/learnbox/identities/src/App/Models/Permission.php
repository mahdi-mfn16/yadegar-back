<?php

namespace Learnbox\Identities\App\Models;

use Learnbox\Base\App\Models\BaseModel;
use Learnbox\Base\App\Traits\HasDate;
use Learnbox\Services\App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $key
 * @property Role[] $roles
 */
class Permission extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'name',
        'key'
    ];


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}
