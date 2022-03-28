<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'terms'=>$this->terms,
            'privacy'=>$this->privacy,
            'facebook'=>$this->facebook,
            'insta'=>$this->insta,
            'twitter'=>$this->twitter,
            'linkedin'=>$this->linkedin,
            'online_price'=>$this->online_price,
            'home_visit_price'=>$this->home_visit_price,
        ];
    }
}
