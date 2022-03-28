<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Http\Resources\{
    OrdersResources,
    OrderResources
};
use App\Models\{
    Order,Product
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function storeOrder(Request $request)
    {
        $rules = [
            'product_id'=>'required|exists:products,id',
            'amount'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'latitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'longitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'address'=>'nullable',
            'note'=>'nullable',
            'total_price' =>'required|regex:/^\d+(\.\d{1,2})?$/',
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->except('lang');

        $data['user_id'] = api()->user()->id;
        $data['status'] = 'new';
        $data['price'] = Product::findOrFail($request->product_id)->price;

        $order = Order::create($data);
        $order = Order::with('product')->findOrFail($order->id);
        return helperJson(new OrderResources($order),'done');
    }//end fun
    public function editOrder(Request $request)
    {
        $rules = [
            'order_id'=>["required",Rule::exists('orders','id')->whereIn('status',['new'])
                ->where('user_id',api()->user()->id)],
            'product_id'=>'required|exists:products,id',
            'amount'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'latitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'longitude'=>'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'address'=>'nullable',
            'note'=>'nullable',
            'total_price' =>'required|regex:/^\d+(\.\d{1,2})?$/',
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->except('lang','order_id');

        $data['user_id'] = api()->user()->id;
        $data['status'] = 'new';
        $data['price'] = Product::findOrFail($request->product_id)->price;

         Order::find($request->order_id)->update($data);
        $order = Order::with('product')->findOrFail($request->order_id);
        return helperJson(new OrderResources($order),'done');
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrders(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $new = Order::with('product')->where('user_id',api()->user()->id)
            ->latest()->whereIn('status',['new','accepted'])->get();
        $old = Order::with('product')->where('user_id',api()->user()->id)->latest()
            ->whereIn('status',['refused','ended'])->get();
        return helperJson(['current'=>OrderResources::collection($new)
        ,'previous'=>OrderResources::collection($old)]);
    }//end fun

}//end class
