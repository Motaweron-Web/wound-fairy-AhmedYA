<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\{AboutUsResources,
    BlogResources,
    NotificationsResources,
    OnlineConsultationResources,
    ProductResources,
    ServicesResources,
    SliderResources,
    SettingResources
};
use App\Models\{AboutUs, Blog, ContactUs, Notifications, OnlineConsultation, Product, Service, Setting, Slider};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt')->only('notifications');
    }

    public function slider()
    {
        return helperJson(SliderResources::collection(Slider::latest()->get()));
    }//end fun
    /**
     * @param Request $request
     * @return void
     */
    public function products(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
            'search'=>'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        if ($request->product_id !='all'){
            $rules = [
                'product_id'=>'required|exists:products,id',
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
                return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
            }
            return helperJson(new ProductResources(Product::with('images')->find($request->product_id)));
        }

        $data = Product::with('images')->latest();

        if ($request->search != ''){
            $search = $request->search;
            $data->where('title_en','LIKE','%'.$search.'%')
                ->where('title_ar','LIKE','%'.$search.'%')
                ->where('details_en','LIKE','%'.$search.'%')
                ->where('details_ar','LIKE','%'.$search.'%');
        }
        $data = $data->get();


        return helperJson(ProductResources::collection($data));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function blogs(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        if (!in_array($request->limit,['','all']))
        {
            $rules = [
                'limit'=>'required|numeric',
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
                return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
            }
            $data = Blog::latest()->take($request->limit)->get();
        }//end if where request have limit
        elseif($request->blog_id != '')
        {
            $rules = [
                'blog_id'=>'required|exists:blogs,id',
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
                return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
            }
            $data = Blog::findOrFail($request->blog_id);
            return helperJson(new BlogResources($data));
        }else{
            $data = Blog::latest()->get();
        }
        return helperJson(BlogResources::collection($data));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function online_consultations(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
            'type'=>'required|in:online,visit',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $where = $request->only('type');

        $data = OnlineConsultation::where($where)->first();

        return helperJson(new OnlineConsultationResources($data));

    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function services(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        $data = Service::latest()->get();
        return helperJson(ServicesResources::collection($data));
    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function notifications()
    {
        $data = Notifications::where('user_id',api()->user()->id)
            ->latest()->get();
        return helperJson(NotificationsResources::collection($data));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function about_us(Request $request)
    {
        $rules = [
            'lang'=>'required|in:ar,en',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = AboutUs::firstOrFail();
        return helperJson(new AboutUsResources($data));
    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function setting()
    {
        $data = Setting::firstOrFail();
        return helperJson(new SettingResources($data));
    }//end fun
    public function contact_us(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email'=>'nullable|email',
            'subject'=>'required',
            'message'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        ContactUs::create($request->all());
        return helperJson(null,'done');
    }//end fun
}//end class
