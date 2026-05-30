<?php

namespace Yadegar\Notifications\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Notifications\App\Http\Requests\NotificationChangeStatusRequest;
use Yadegar\Notifications\App\Models\NotificationLog;
use Yadegar\Notifications\App\Services\NotificationLogService;
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
