<?php

namespace Yadegar\Notifications\App\Repositories\Interfaces;

use Yadegar\Base\App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllUnreads(int $userId): Collection|array;

    public function updateStatus(int $id, int $status): bool;
}
