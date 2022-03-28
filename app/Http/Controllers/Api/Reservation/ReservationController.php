<?php

namespace App\Http\Controllers\Api\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResources;
use App\Http\Resources\ReservationResources;
use App\Models\Reservation;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    use DefaultImage;
    public function storeReservation(Request $request)
    {
        $rules = [
            'complaint'=>'required',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000',
            'service_id'=>'required|exists:services,id',
            'date_time'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'total_price' =>'required|regex:/^\d+(\.\d{1,2})?$/',
            'latitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'longitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'note'=>'nullable',
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules, [
            'images.*.required' => 'Please upload an image',
            'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        $images = [];
        if ($request->has('images')&& count($request->images)){
            foreach ($request->images as $key => $image) {
                $images[] = $this->uploadFiles('Reservation', $request->images[$key]);
            }
        }

        $data = $request->except('lang','images');

        $data['user_id'] = api()->user()->id;
        $data['status'] = 'new';
        $data['images'] = json_encode($images, true);

        $create = Reservation::create($data);
        $find = Reservation::with('service')->find($create->id);
        return helperJson(new ReservationResources($find));
    }//end fun
    public function editReservation(Request $request)
    {
        $rules = [
            'reservation_id'=>["required",Rule::exists('reservations','id')->whereIn('status',['new'])
                ->where('user_id',api()->user()->id)],
            'complaint'=>'required',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000',
            'service_id'=>'required|exists:services,id',
            'date_time'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'total_price' =>'required|regex:/^\d+(\.\d{1,2})?$/',
            'latitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'longitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'note'=>'nullable',
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules, [
            'images.*.required' => 'Please upload an image',
            'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $find = Reservation::find($request->reservation_id);

        $images = json_decode($find->images);
        if ($request->has('images')&& count($request->images)){
            $images = [];
            foreach ($request->images as $key => $image) {
                $images[] = $this->uploadFiles('Reservation', $request->images[$key]);
            }
        }

        $data = $request->except('lang','images','reservation_id');

        $data['user_id'] = api()->user()->id;
        $data['status'] = 'new';
        $data['images'] = json_encode($images, true);

        $find->update($data);
        $find = Reservation::with('service')->find($request->reservation_id);
        return helperJson(new ReservationResources($find));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReservations(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $new = Reservation::with('service')->where('user_id',api()->user()->id)
            ->latest()->whereIn('status',['new','accepted'])->get();
        $old = Reservation::with('service')->where('user_id',api()->user()->id)->latest()
            ->whereIn('status',['refused','ended'])->get();
        return helperJson(['current'=>ReservationResources::collection($new)
            ,'previous'=>ReservationResources::collection($old)]);
    }
}//end class
