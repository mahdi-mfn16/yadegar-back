<?php

namespace Hoomat\Management\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Management\App\Http\Requests\Organization\OrganizationIndexRequest;
use Hoomat\Management\App\Http\Requests\Organization\OrganizationStoreRequest;
use Hoomat\Management\App\Http\Resources\OrganizationResource;
use Hoomat\Management\App\Models\DTOs\OrganizationDTO;
use Hoomat\Management\App\Models\Organization;
use Hoomat\Management\App\Services\OrganizationService;
use Illuminate\Http\JsonResponse;

/**
 * @group Organization
 */
class OrganizationController extends Controller
{
    public function __construct(
        private readonly OrganizationService       $organizationService
    )
    {
    }


    /**
     * Organization Index
     *
     * @param OrganizationIndexRequest $request
     * @return JsonResponse
     */
    public function index(OrganizationIndexRequest $request): JsonResponse
    {
        $organizations = $this->organizationService->getOrganizations($request);
        return $this->dynamicResponse($organizations, OrganizationResource::class);
    }


    /**
     *  Organization store
     *
     * @param OrganizationStoreRequest $request
     * @return JsonResponse
     */
    public function store(OrganizationStoreRequest $request): JsonResponse
    {
        $organization = $this->organizationService->create(OrganizationDTO::fromRequest($request));
        return $this->successResponse(OrganizationResource::make($organization));
    }


    /**
     *   Organization show
     *
     * @param Organization $organization
     * @return JsonResponse
     */
    public function show(Organization $organization): JsonResponse
    {
        $organization = $this->organizationService->show($organization['id']);
        return $this->successResponse(OrganizationResource::make($organization));
    }


    /**
     *  Organization update
     *
     * @param OrganizationStoreRequest $request
     * @param Organization $organization
     * @return JsonResponse
     */
    public function update(OrganizationStoreRequest $request, Organization $organization): JsonResponse
    { 
        $organization = $this->organizationService->update($organization, OrganizationDTO::fromModel($request->all()));
        return $this->successResponse(OrganizationResource::make($organization));
    }


    /**
     * Organization delete
     * 
     * @param Organization   $organization
     * @return JsonResponse
     */
    public function destroy(Organization $organization): JsonResponse
    {
        $organization = $this->organizationService->delete($organization);
        return $this->successResponse();
    }




}
