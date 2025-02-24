<?php

namespace Learnbox\Notifications\App\Repositories\Interfaces;

use Learnbox\Base\App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllUnreads(int $userId): Collection|array;

    public function updateStatus(int $id, int $status): bool;
}
