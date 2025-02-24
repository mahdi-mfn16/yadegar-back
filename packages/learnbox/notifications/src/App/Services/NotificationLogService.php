<?php

namespace Learnbox\Notifications\App\Services;

use Learnbox\Base\App\Services\BaseService;
use Learnbox\Notifications\App\Models\DTOs\NotificationLogDTO;
use Learnbox\Notifications\App\Models\Notification;
use Learnbox\Notifications\App\Models\NotificationLog;
use Learnbox\Notifications\App\Repositories\Interfaces\NotificationLogRepositoryInterface;

class NotificationLogService extends BaseService
{
    public function __construct(
        NotificationLogRepositoryInterface $repository
    )
    {
        parent::__construct($repository);
    }


    public function createMany(int $notification_id, array $receiver_ids)
    {
        $logs = [];
        foreach ($receiver_ids as $rec) {
            $logs[] = (new NotificationLogDTO(
                notification_id: $notification_id,
                receiver_id: $rec,
                status: 1
            ))->toArray();
        }
        return $this->repository->createMany($logs);
    }


    public function markAsRead(int $userId): int
    {
        return $this->repository->markAsRead($userId);
    }


    public function changeStatus(NotificationLog $log, int $status)
    {
        return $this->repository->updateStatus($log->id, $status);
    }


    public function changeStatusByNotification(Notification $notif, int $status)
    {
        return $this->repository->updateStatusByNotification($notif->id, $status);
    }
}
