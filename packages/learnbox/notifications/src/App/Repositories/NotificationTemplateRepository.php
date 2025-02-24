<?php

namespace Learnbox\Notifications\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Notifications\App\Models\NotificationTemplate;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;
use Learnbox\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateFilterScope;
use Learnbox\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateLoadScope;
use Learnbox\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateSearchScope;
use Learnbox\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateSortScope;

class NotificationTemplateRepository extends BaseRepository implements NotificationTemplateRepositoryInterface
{
    public function __construct(
        NotificationTemplate $model,
        NotificationTemplateFilterScope $filterScope,
        NotificationTemplateSortScope $sortScope,
        NotificationTemplateSearchScope $searchScope,
        NotificationTemplateLoadScope $loadScope
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }
}
