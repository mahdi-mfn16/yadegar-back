<?php

namespace Learnbox\Notifications\App\Jobs;

use Learnbox\Notifications\App\Models\Notification;
use Learnbox\Notifications\App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateNotificationStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Notification $notif)
    {
    }


    /**
     * Execute the job.
     */
    public function handle(
        NotificationService $notifService
    ): void
    {
        $isInApp = $this->notif->type === ['in-app'];
        $notifService->changeStatus($this->notif, 3, $isInApp);
    }
}
