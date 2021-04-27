<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PostWithTagResource extends JsonResource
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
            'post_id' => $this->post_id,
            'tag_id' => $this->tag_id,
            //'tag'=>DB::table('tags')->where('id', $this->tag_id)->first()
        ];
    }
}
