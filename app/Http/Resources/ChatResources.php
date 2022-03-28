<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResources extends JsonResource
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
            'from_user_id'=>$this->from_user_id,
            'to_user_id'=>$this->to_user_id,
            'date'=>date('Y-m-d',strtotime($this->created_at)),
            'time'=>date('h:i A',strtotime($this->created_at)),
            'text'=>$this->text,
            'image'=>get_file($this->image),
            'type'=>$this->type,
        ];
    }
}
