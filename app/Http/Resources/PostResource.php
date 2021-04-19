<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'imgUrl' => $this->imgUrl,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'is_resolved' => $this->is_resolved
        ];
    }
}
