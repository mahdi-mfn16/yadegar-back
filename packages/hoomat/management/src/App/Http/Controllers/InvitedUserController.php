<?php

namespace Hoomat\Management\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Management\App\Http\Requests\InvitedUser\InvitedUserIndexRequest;
use Hoomat\Management\App\Http\Requests\InvitedUser\InvitedUserStoreRequest;
use Hoomat\Management\App\Http\Resources\InvitedUserResource;
use Hoomat\Management\App\Models\DTOs\InvitedUserDTO;
use Hoomat\Management\App\Models\InvitedUser;
use Hoomat\Management\App\Services\InvitedUserService;
use Illuminate\Http\JsonResponse;

/**
 * @group InvitedUser
 */
class InvitedUserController extends Controller
{
    public function __construct(
        private readonly InvitedUserService      $invitedUserService
    )
    {
    }


    /**
     * InvitedUser Index
     *
     * @param InvitedUserIndexRequest $request
     * @return JsonResponse
     */
    public function index(InvitedUserIndexRequest $request): JsonResponse
    {
        $invitedUsers = $this->invitedUserService->getInvitedUsers($request);
        return $this->dynamicResponse($invitedUsers, InvitedUserResource::class);
    }


    /**
     *  InvitedUser store
     *
     * @param InvitedUserStoreRequest $request
     * @return JsonResponse
     */
    public function store(InvitedUserStoreRequest $request): JsonResponse
    {
        $invitedUser = $this->invitedUserService->create(InvitedUserDTO::fromRequest($request));
        return $this->successResponse(InvitedUserResource::make($invitedUser));
    }


    /**
     *   InvitedUser show
     *
     * @param InvitedUser $invitedUser
     * @return JsonResponse
     */
    public function show(InvitedUser $invitedUser): JsonResponse
    {
        $invitedUser = $this->invitedUserService->show($invitedUser['id']);
        return $this->successResponse(InvitedUserResource::make($invitedUser));
    }


    /**
     *  InvitedUser update
     *
     * @param InvitedUserStoreRequest $request
     * @param InvitedUser $invitedUser
     * @return JsonResponse
     */
    public function update(InvitedUserStoreRequest $request, InvitedUser $invitedUser): JsonResponse
    { 
        $invitedUser = $this->invitedUserService->update($invitedUser, InvitedUserDTO::fromModel($request->all()));
        return $this->successResponse(InvitedUserResource::make($invitedUser));
    }


    /**
     * InvitedUser delete
     * 
     * @param InvitedUser   $invitedUser
     * @return JsonResponse
     */
    public function destroy(InvitedUser $invitedUser): JsonResponse
    {
        $invitedUser = $this->invitedUserService->delete($invitedUser);
        return $this->successResponse();
    }



    /**
     * InvitedUser send invite
     * 
     * @param InvitedUser   $invitedUser
     * @return JsonResponse
     */
    public function sendInvite(InvitedUser $invitedUser): JsonResponse
    {
        // $invitedUser = $this->invitedUserService->sendInvite($invitedUser);
        return $this->successResponse();
    }




}
