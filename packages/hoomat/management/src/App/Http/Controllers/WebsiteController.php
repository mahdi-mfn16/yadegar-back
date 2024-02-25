<?php

namespace Hoomat\Management\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Management\App\Http\Requests\Website\WebsiteIndexRequest;
use Hoomat\Management\App\Http\Requests\Website\WebsiteStoreRequest;
use Hoomat\Management\App\Http\Requests\Website\WebsiteTransferRequest;
use Hoomat\Management\App\Http\Requests\Website\WebsiteUpdatePlanRequest;
use Hoomat\Management\App\Http\Requests\Website\WebsiteVerifyInstallRequest;
use Hoomat\Management\App\Http\Resources\WebsiteResource;
use Hoomat\Management\App\Models\Website;
use Hoomat\Management\App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;

/**
 * @group Website
 */
class WebsiteController extends Controller
{
    public function __construct(
        private readonly WebsiteService      $websiteService
    )
    {
    }


    /**
     * Website Index
     *
     * @param WebsiteIndexRequest $request
     * @return JsonResponse
     */
    public function index(WebsiteIndexRequest $request): JsonResponse
    {
        $websites = $this->websiteService->getWebsites($request);
        return $this->dynamicResponse($websites, WebsiteResource::class);
    }


    /**
     *  Website store
     *
     * @param WebsiteStoreRequest $request
     * @return JsonResponse
     */
    public function store(WebsiteStoreRequest $request): JsonResponse
    {
        $website = $this->websiteService->createWebsite($request);
        return $this->successResponse(WebsiteResource::make($website));
    }


    /**
     *   Website show
     *
     * @param Website $website
     * @return JsonResponse
     */
    public function show(Website $website): JsonResponse
    {
        $website = $this->websiteService->show($website['id']);
        return $this->successResponse(WebsiteResource::make($website));
    }



    /**
     * Website delete
     * 
     * @param Website   $website
     * @return JsonResponse
     */
    public function destroy(Website $website): JsonResponse
    {
        $website = $this->websiteService->delete($website);
        return $this->successResponse();
    }



    /**
     *  Website update
     *
     * @param WebsiteUpdatePlanRequest $request
     * @param Website $website
     * @return JsonResponse
     */
    public function updatePlan(WebsiteUpdatePlanRequest $request, Website $website): JsonResponse
    { 
        $website = $this->websiteService->updatePlan($website, $request);
        return $this->successResponse(WebsiteResource::make($website));
    }


    /**
     * Website transfer
     * 
     * @param Website   $website
    * @param TransferWebsiteRequest $request
     * @return JsonResponse
     */
    public function transferWebsite(WebsiteTransferRequest $request, Website $website): JsonResponse
    {
        $this->websiteService->transferWebsite($request, $website);
        return $this->successResponse();
    }


      /**
     * Website verify installation
     * 
     * @param Website   $website
     * @param VerifyWebsiteInstallRequest $request
     * @return JsonResponse
     */
    public function verifyInstall(WebsiteVerifyInstallRequest $request, Website $website): JsonResponse
    {
        return $this->successResponse();
    }




}
