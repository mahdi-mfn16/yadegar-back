<?php

namespace Yadegar\Notifications\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Notifications\App\Models\Notification;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationLogRepositoryInterface;
use Yadegar\Notifications\App\Repositories\Interfaces\NotificationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NotificationService extends BaseService
{
    public function __construct(
        NotificationRepositoryInterface $repository,
        private readonly NotificationLogRepositoryInterface $logRepo
    )
    {
        parent::__construct($repository);
    }


    public function getAllUnreads(int $userId): Collection|array
    {
        return $this->repository->getAllUnreads($userId);
    }


    public function changeStatus(Notification $notif, int $status, bool $updateLogs = true): void
    {
        $this->repository->updateStatus($notif->id, $status);
        if ($updateLogs) {
            $this->logRepo->updateStatusByNotification($notif->id, $status);
        }
    }


    public function subscribeWebpush($endpoint, $key, $token): void
    {
        auth()->user()->updatePushSubscription($endpoint, $key, $token, 'aesgcm');
    }
}
