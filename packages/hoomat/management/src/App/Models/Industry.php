<?php

namespace Hoomat\Management\App\Models;

use Hoomat\Base\App\Models\BaseModel;
use Hoomat\Base\App\Traits\HasDate;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends BaseModel
{
    use HasDate;

    protected $fillable = [
        'title',
    ];



    public function websites(): HasMany
    {
        return $this->hasMany(Website::class, 'industry_id', 'id');
    }




   


}
