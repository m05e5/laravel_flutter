<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

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
            'is_resolved' => $this->is_resolved,
            'user' => DB::table('users')->where('id', $this->user_id)->first(),
            'tags' => self::getTag($this->id),
        ];
    }

    public function getTag($postId){
        $associatedTagIds = DB::table('post_with_tags')->where('post_id', $postId)->get('tag_id');
        foreach ($associatedTagIds as $associatedTagId ){
            $tags []= DB::table('tags')->where('id', $associatedTagId->tag_id)->first();
        }
        return TagResource::collection($tags);
    }

}
