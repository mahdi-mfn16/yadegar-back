<?php

namespace Hoomat\Management\App\Http\Controllers;

use Hoomat\Base\App\Http\Controllers\Controller;
use Hoomat\Management\App\Http\Requests\Industry\IndustryIndexRequest;
use Hoomat\Management\App\Http\Resources\IndustryResource;
use Hoomat\Management\App\Services\IndustryService;
use Illuminate\Http\JsonResponse;

/**
 * @group Industry
 */
class IndustryController extends Controller
{
    public function __construct(
        private readonly IndustryService       $industryService
    )
    {
    }


    /**
     * Industry Index
     *
     * @param IndustryIndexRequest $request
     * @return JsonResponse
     */
    public function index(IndustryIndexRequest $request): JsonResponse
    {
        $industries = $this->industryService->index();
        return $this->dynamicResponse($industries, IndustryResource::class);
    }

 
}
