<?php

namespace Hoomat\Pricing\App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'monthly_price' => $this->monthly_price,
            'annual_price' => $this->annual_price,
            'options' => PlanOptionResource::collection($this->whenLoaded('options')),
        ];
    }
}