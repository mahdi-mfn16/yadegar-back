<?php

namespace Learnbox\Notifications\App\Http\Controllers;

use Learnbox\Base\App\Http\Controllers\Controller;
use Learnbox\Notifications\App\Http\Requests\NotificationChangeStatusRequest;
use Learnbox\Notifications\App\Models\NotificationLog;
use Learnbox\Notifications\App\Services\NotificationLogService;
use Illuminate\Http\JsonResponse;

/**
 * @group Notification
 */
class NotificationLogController extends Controller
{
    public function __construct(
        private readonly NotificationLogService $logService
    )
    {
    }


    /**
     * Cancel Notification Log
     *
     * @param NotificationChangeStatusRequest $request
     * @param NotificationLog                 $notificationLog
     * @return JsonResponse
     */
    public function changeStatus(NotificationChangeStatusRequest $request, NotificationLog $notificationLog): JsonResponse
    {
        if ($notificationLog->status === 3) {
            return $this->errorResponse([], 400, __('error.notification_cant_be_canceled'));
        }

        $this->logService->changeStatus($notificationLog, $request->input('status'));
        return $this->successResponse();
    }
}
