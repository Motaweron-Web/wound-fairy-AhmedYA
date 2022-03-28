<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images = [];
        foreach(json_decode($this->images) as $image){
            $images[] = get_file($image);
        }

        return [
            'id'=>$this->id,
            'complaint'=>$this->complaint,
            'images'=>$images,
            'date' =>date('Y-m-d',$this->date_time),
            'time' =>date('h:i A',$this->date_time),
            'total_price' =>$this->total_price,
            'latitude' =>$this->latitude,
            'longitude' =>$this->longitude,
            'address' =>$this->address,
            'service' =>new ServicesResources($this->service),
        ];
    }
}
