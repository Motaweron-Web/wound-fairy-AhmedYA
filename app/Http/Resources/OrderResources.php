<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResources extends JsonResource
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
            'date'=>date('Y-m-d',strtotime($this->created_at)),
            'time'=>date('h:i A',strtotime($this->created_at)),
            'amount'=>$this->amount,
            'status'=>$this->status,
            'total_price'=>$this->total_price,
            'address'=>$this->address,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'product'=>new ProductResources($this->product)
        ];
    }
}
