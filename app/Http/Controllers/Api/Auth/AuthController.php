<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\DefaultImage;
use App\Models\User;
use App\Models\PhoneToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\{
    UserResources,
};
class AuthController extends Controller
{
    use DefaultImage;
    public function __construct()
    {
        $this->middleware('jwt')->only('logout','getProfile','insert_token','update_profile');
    }//end fun
    public function login(Request $request){
        $rules = [
            'phone_code'=>'required|exists:users,phone_code',
            'phone'=>'required|exists:users,phone'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);
            $user = User::where($data);
            if ($user->count() ){
                if (! $token = JWTAuth::fromUser($user->firstOrFail())) {
                    return helperJson(null,'there is no user',400);
                }
                $user = $user->firstOrFail();
                $user->token = $token;
                return helperJson(new UserResources($user),'good login');
            }else{
                return helperJson(null,'there is no user',400);
            }


    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        $rules = [
            'phone_code'=>'required',
            'phone'=>'required|unique:users,phone',
            'name'=>'required|min:10|max:191',
            'email'=>'nullable|unique:users,email',
            'image'=>'nullable',

        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);


        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('users',$request->file('image'));
        }else{
            $data['image'] = $this->storeDefaultImage('users',$request->name);
        }

        $user = User::create($data);



        if ($user){
            if (! $token = JWTAuth::fromUser($user)) {
                return helperJson(null,'there is no user',400);
            }
        }
        $user->token = $token;

        return helperJson(new UserResources($user),'good register');

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
        $rules = [
            'phone_token'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else{
            PhoneToken::where('phone_token',$request->phone_token)->delete();
            \api()->logout();
            return helperJson(null,'log out successfully',200);
        }

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(Request $request){
        if (\api()->check()){
            if (! $token = JWTAuth::fromUser(\api()->user())) {
                return helperJson(null,'there is no user',400);
            }
        }
        api()->user()->token = $token;
        return helperJson(new UserResources(api()->user()),'good query');
    }//end fun
    /**
     * @param $token
     * @param $user
     * @return array
     */
    protected function respondWithToken($token,$user)
    {
        return [
            'user'=>$user,
            'access_token' => 'Bearer '.$token,
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL()
        ];
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    //======================================================
    //======================================================
    public function update_profile(Request $request){


        $user = \auth()->user();

        $rules = [
//            'phone_number'=>'required|unique:customers,phone_number',
            'phone_code'=>'nullable',
            'phone'=>"nullable|unique:users,phone,{$user->id}",
            'name'=>'required|min:10|max:191',
            'email'=>"nullable|unique:users,email,{$user->id}",
            'image'=>'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else {
            $data = $request->all();
//            $user = Customers::where('id',$request->id)->first();

            if ($request->hasFile('image')){
                $data['image'] = $this->uploadFiles('users',$request->file('image'));
            }
            $user->update($data);
            if (! $token = JWTAuth::fromUser($user)) {
                return helperJson(null,'there is no user',400);
            }
            $user->token = $token;

            return helperJson(new UserResources($user),'profile updated successfully');
        }

    }//end fun
    //==========================================================
    //==========================================================
    public function insert_token(Request $request){
        $rules = [
            'phone_token'=>'required',
            'type'=>'required|in:android,ios',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        $data = $request->all();
        $data['user_id'] = api()->user()->id;

             PhoneToken::updateOrCreate($data);
            return helperJson(null,'successfully');

    }//end fun


}//end class
