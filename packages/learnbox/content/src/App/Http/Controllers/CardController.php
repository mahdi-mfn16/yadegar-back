<?php

namespace Yadegar\Content\App\Http\Controllers;

use Yadegar\Base\App\Http\Controllers\Controller;
use Yadegar\Content\App\Models\Card;
use Yadegar\Content\App\Models\DTOs\CardDTO;
use Yadegar\Content\App\Http\Requests\Card\CardIndexRequest;
use Yadegar\Content\App\Http\Requests\Card\CardStoreRequest;
use Yadegar\Content\App\Http\Requests\Card\CardUpdateRequest;
use Yadegar\Content\App\Http\Resources\CardResource;
use Yadegar\Content\App\Services\CardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

/**
 * @group Yadegar\Content
 * @subgroup Card
 */
class CardController extends Controller
{
    public function __construct(
        private readonly CardService $cardService
    )
    {}


    /**
     * Card Index
     *
     * @param CardIndexRequest $request
     * @return JsonResponse
     */
    public function index(CardIndexRequest $request): JsonResponse
    {
        Gate::authorize('viewAny', [Card::class]);
        $items = $this->cardService->index();
        return $this->dynamicResponse($items, CardResource::class);
    }


    /**
     * Card Single
     *
     * @param Card $card
     * @return JsonResponse
     */
    public function show(Card $card): JsonResponse
    {
        Gate::authorize('view', $card);
        $item = $this->cardService->show($card->id);
        return $this->dynamicResponse($item, CardResource::class);
    }


    /**
     * Card Store
     *
     * @param CardStoreRequest $request
     * @return JsonResponse
     */
    public function store(CardStoreRequest $request): JsonResponse
    {
        Gate::authorize('create', [Card::class]);
        $item = $this->cardService->create(CardDTO::fromRequest($request));
        $item = $this->cardService->show($item->id);
        return $this->dynamicResponse($item, CardResource::class);
    }


    /**
     * Card Update
     *
     * @param CardUpdateRequest $request
     * @param Card $card
     * @return JsonResponse
     */
    public function update(CardUpdateRequest $request, Card $card): JsonResponse
    {
        Gate::authorize('update', $card);
        $this->cardService->update($card, CardDTO::fromModel($card, $request->all()));
        $item = $this->cardService->show($card->id);
        return $this->dynamicResponse($item, CardResource::class);
    }


    /**
     * Card Delete
     *
     * @param Card $card
     * @return JsonResponse
     */
    public function destroy(Card $card): JsonResponse
    {
        Gate::authorize('delete', $card);
        $this->cardService->delete($card);
        return $this->successResponse();
    }
}