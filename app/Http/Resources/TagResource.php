<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class TagResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'departement_id' => $this->departement_id,
            

        ];
    }
}
