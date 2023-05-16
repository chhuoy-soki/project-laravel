<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventResource extends JsonResource
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
            'type_sport'=>$this->type_sport,
            'date'=>$this->date,
            'time'=>$this->time,
            'staduim'=>$this->staduim,
            'location'=>$this->location,
            'description'=>$this->description,
            'teams'=>TeamResource::collection($this->teams)
        ];
    }
}
