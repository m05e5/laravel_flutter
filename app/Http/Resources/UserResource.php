<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
           'first_name' => $this->first_name,
           'last_name' => $this->last_name,
           'email' => $this->email,
           'matricule' => $this->matricule,
           'password' => $this->password,
           'filiere' => $this->filiere,
           'imgProfile' => $this->imgProfile,
           'question_asked' => $this->question_asked,
           'question_answered' => $this->question_answered,
       ];
    }
}
