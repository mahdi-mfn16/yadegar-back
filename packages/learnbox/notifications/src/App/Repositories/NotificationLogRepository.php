<?php

namespace Learnbox\Notifications\App\Repositories;

use Learnbox\Base\App\Repositories\BaseRepository;
use Learnbox\Notifications\App\Models\NotificationLog;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationLogRepositoryInterface;
use Learnbox\Notifications\App\Scopes\NotificationLog\NotificationLogFilterScope;
use Learnbox\Notifications\App\Scopes\NotificationLog\NotificationLogLoadScope;
use Learnbox\Notifications\App\Scopes\NotificationLog\NotificationLogSearchScope;
use Learnbox\Notifications\App\Scopes\NotificationLog\NotificationLogSortScope;

class NotificationLogRepository extends BaseRepository implements NotificationLogRepositoryInterface
{
    public function __construct(
        NotificationLog $model,
        NotificationLogFilterScope $filterScope,
        NotificationLogSortScope $sortScope,
        NotificationLogSearchScope $searchScope,
        NotificationLogLoadScope $loadScope,
    )
    {
        parent::__construct($model, $filterScope, $sortScope, $searchScope, $loadScope);
    }


    public function createMany(array $items): bool
    {
        return $this->model->query()->insert($items);
    }


    public function markAsRead(int $userId): int
    {
        return $this->model->query()
            ->where('status', config('NotificationsConfig.status.sent'))
            ->where('receiver_id', $userId)
            ->whereNull('read_at')
            ->whereHas('notification', function($query) {
                $query->where('type', 'LIKE', '%in-app%');
            })
            ->update([
                'read_at' => now()
            ]);
    }


    public function updateStatus(int $logId, int $status): bool
    {
        return $this->model->query()
            ->where('id', $logId)
            ->update(['status' => $status]);
    }


    public function updateStatusByNotification(int $notifId, int $status): bool
    {
        return $this->model->query()
            ->where('notification_id', $notifId)
            ->update(['status' => $status]);
    }
}
