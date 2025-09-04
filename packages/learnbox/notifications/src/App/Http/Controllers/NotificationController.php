<?php

namespace Yadegar\Notifications\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Notifications\App\Facades\Notifier;
use Yadegar\Notifications\App\Http\Requests\NotificationChangeStatusRequest;
use Yadegar\Notifications\App\Http\Requests\NotificationIndexRequest;
use Yadegar\Notifications\App\Http\Requests\NotificationStoreRequest;
use Yadegar\Notifications\App\Http\Requests\NotificationWebpushInitRequest;
use Yadegar\Notifications\App\Http\Resources\NotificationResource;
use Yadegar\Notifications\App\Http\Resources\NotificationSingleResource;
use Yadegar\Notifications\App\Models\Notification;
use Yadegar\Notifications\App\Services\NotificationService;
use Yadegar\Notifications\App\Services\SendNotificationService;
use Illuminate\Http\JsonResponse;

/**
 * @group Notification
 */
class NotificationController extends Controller
{
    public function __construct(
        private readonly NotificationService        $notificationService,
        private readonly SendNotificationService    $sendNotifService
    )
    {
    }


    /**
     * Notification Index
     *
     * @param NotificationIndexRequest $request
     * @return JsonResponse
     */
    public function index(NotificationIndexRequest $request): JsonResponse
    {
        $notifications = $this->notificationService->index();

        return $this->dynamicResponse($notifications, NotificationResource::class);
    }


    /**
     * Send Notification
     *
     * @param NotificationStoreRequest $request
     * @return JsonResponse
     */
    public function store(NotificationStoreRequest $request): JsonResponse
    {
        Notifier::text($request->input('text'))
            ->details($request->input('details'))
            ->type($request->input('type'))
            ->sendAt($request->input('send_at') ?? now());
        // $notif = $this->sendNotifService
        //     ->text($request->input('text'))
        //     ->details($request->input('details'))
        //     ->type($request->input('type'))
        //     ->sendAt($request->input('send_at') ?? now());

        // if ($request->hasFile('image')) {
        //     $notif = $notif->image($request->file('image'));
        // }

        // $notif->send();
        return $this->successResponse();
    }


    /**
     * Notification Single
     *
     * @param Notification $notification
     * @return JsonResponse
     */
    public function show(Notification $notification): JsonResponse
    {
        return $this->dynamicResponse(
            $this->notificationService->show($notification->id),
            NotificationSingleResource::class
        );
    }


    /**
     * Cancel Notification
     *
     * @param NotificationChangeStatusRequest $request
     * @param Notification                    $notification
     * @return JsonResponse
     */
    public function changeStatus(NotificationChangeStatusRequest $request, Notification $notification): JsonResponse
    {
        if ($notification->send_at <= now()) {
            return $this->errorResponse([], 400, __('error.notification_cant_be_canceled'));
        }

        $status = $request->input('status');

        $this->notificationService->changeStatus($notification, $status);
        return $this->successResponse();
    }


    /**
     * Webpush Register
     *
     * @param NotificationWebpushInitRequest $request
     * @return JsonResponse
     */
    public function webpushInit(NotificationWebpushInitRequest $request): JsonResponse
    {
        $hasKeys = isset($request->keys) && is_array($request->keys);

        $this->notificationService->subscribeWebpush(
            $request->endpoint,
            $hasKeys ? $request->keys['p256dh'] : null,
            $hasKeys ? $request->keys['auth'] : null
        );
        return $this->successResponse();
    }
}
