<?php

namespace Hoomat\Management\App\Repositories;

use Hoomat\Base\App\Repositories\BaseRepository;
use Hoomat\Management\App\Models\Website;
use Hoomat\Management\App\Repositories\Interfaces\WebsiteRepositoryInterface;
use Hoomat\Management\App\Scopes\Website\WebsiteFilterScope;
use Hoomat\Management\App\Scopes\Website\WebsiteLoadScope;
use Hoomat\Management\App\Scopes\Website\WebsiteSearchScope;
use Hoomat\Management\App\Scopes\Website\WebsiteSortScope;

class WebsiteRepository extends BaseRepository implements WebsiteRepositoryInterface
{
    public function __construct(
        Website $model,
        WebsiteFilterScope $filterScope,
        WebsiteSortScope $sortScope,
        WebsiteSearchScope $searchScope,
        WebsiteLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
