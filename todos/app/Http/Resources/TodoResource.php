<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'completed' => $this->completed,
            'created_at' => $this->created_at,
            'id' => $this->id,
            'text' => $this->text,
            'updated_at' => $this->updated_at,
        ];
    }
}
