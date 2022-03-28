<?php
namespace App\Http\Controllers\Api\Chat;
use App\Http\Controllers\Controller;
use App\Traits\DefaultImage;
use App\Http\Resources\{
    ChatResources
};
use App\Models\{Chat, ChatData};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    use DefaultImage;

    public function storeChatData(Request $request)
    {
        $rules = [
            'complaint' => 'required',
            'type' => 'required|in:online,visit',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000'
        ];
        $validator = Validator::make($request->all(), $rules, [
            'images.*.required' => 'Please upload an image',
            'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        }
        $data = $request->except('images');
        $images = [];
        if ($request->has('images')&& count($request->images)){
            foreach ($request->images as $key => $image) {
                $images[] = $this->uploadFiles('ChatData', $request->images[$key]);
            }
        }
        $data['images'] = json_encode($images, true);
        $data['user_id'] = api()->user()->id;
        ChatData::create($data);
        return helperJson(null, 'done');
    }//end fun

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function user_chat()
    {
        $data = Chat::where('from_user_id', api()->user()->id)
            ->orWhere('to_user_id', api()->user()->id)->get();
        return helperJson(ChatResources::collection($data));
    }//end fun

    public function storeChatMessage(Request $request)
    {
        $rules = [
            'text' => 'nullable',
            'type' => 'required|in:text,image',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        }
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFiles('chat', $request->file('image'));
        }
        $data['from_user_id'] = api()->user()->id;

        return helperJson(new ChatResources(Chat::create($data)),'done');

    }//end fun
}//end class
