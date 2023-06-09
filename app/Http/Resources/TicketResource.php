<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'price'=>$this->price,
            'event'=>$this->event->type_sport,
            'date'=>$this->event->date,
            'time'=>$this->event->time,
            'buyer'=>$this->user->name,
            'email'=>$this->user->email,
        ];
    }
}
