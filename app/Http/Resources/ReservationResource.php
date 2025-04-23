<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            // Ne retourne **pas** la relation vers user ici !
            // 'user' => new UserResource($this->whenLoaded('user')), ❌
        ];
    }
}
