<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
           'id' => $this->id,
           'content' => $this->content,
           'imgUrl' => $this->imgUrl,
           'post_id' => $this->post_id,
           'user_id' => $this->user_id,
           'user' => DB::table('users')->where('id', $this->user_id)->first(),
           'is_validated' => $this->is_validated,
           'imgUrl' => $this->imgUrl,
       ];
    }
}
