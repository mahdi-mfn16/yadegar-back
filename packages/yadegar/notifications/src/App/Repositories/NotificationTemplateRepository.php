<?php

namespace Yadegar\Notifications\App\Repositories;

use Yadegar\Base\App\Repositories\BaseRepository;
use Yadegar\Notifications\App\Models\NotificationTemplate;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationTemplateRepositoryInterface;
use Yadegar\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateFilterScope;
use Yadegar\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateLoadScope;
use Yadegar\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateSearchScope;
use Yadegar\Notifications\App\Scopes\NotificationTemplate\NotificationTemplateSortScope;

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
