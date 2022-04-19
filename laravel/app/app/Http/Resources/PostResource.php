<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'body' => $this->body,
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
