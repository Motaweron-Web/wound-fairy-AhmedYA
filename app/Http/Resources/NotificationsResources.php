<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResources extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'text'=>$this->text,
            'date'=>date('Y-m-d',strtotime($this->created_at)),
            'time'=>date('h:i A',strtotime($this->created_at)),
        ];
    }
}
