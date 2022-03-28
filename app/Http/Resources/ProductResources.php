<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang = request()->lang??'en';
        return [
            'id'=>$this->id,
            'title'=>$this['title_'.$lang],
            'details'=>$this['details_'.$lang],
            'image'=>get_file($this->image),
            'price'=>$this->price,
            'images'=>SliderResources::collection($this->images),
        ];
    }
}
