<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use App\Events\ChatEvent;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::orderBy('id', 'DESC')->paginate(5);
        return view('Admin.chat.index', compact('chats'));
    }
    public function destroy($id)
    {
       $chat = Chat::find($id);
       $chat->delete();
        return redirect()->back()->with('message','تم حذف الرسالة بنجاح');
    }

    // ahmed yahya
    public function chatForm()
    {
        $rooms = Room::orderBy('updated_at','desc')->get();
        $users = User::all();
        // should be when user register or pay success
        foreach ($users as $user){
            $room = Room::where('user_id',$user->id)->first();
            if(!$room){
                $new = new Room();
                $new->user_id = $user->id;
                $new->save();
            }
        }
        return view('Admin.chat.send' ,compact('rooms'));
    }


    public function sendAdminMessage(Request $request){
        $findRoom = Room::where('id',$request->room_id)->firstOrFail();
        $data = [];
        $data['to_user_id']   = $findRoom->user->id;
        $data['from_user_id'] = null;
        $data['text']         = $request->msg;
        $data['room_id']      = $findRoom->id;
        $data['date']         = date('y-m-d');
        $data['time']         = Carbon::now()->addHours(2);
        $data['is_read']      = '0';
        $info = Chat::create($data);
        if ($info){
            broadcast(new ChatEvent($info->id));
        }
        $info->since = $info->created_at->diffForHumans();
        return response()->json(['code'=>200,'info'=>$info],200);
    }//end fun

    public function testSend(){
        $info = Chat::create([
           'room_id'      => 1,
           'from_user_id' => 1,
           'to_user_id'   => null,
           'date'         => date('y-m-d'),
           'time'         => Carbon::now()->addHours(2),
           'is_read'      => '0',
           'text'         => ' عمد',
        ]);
        broadcast(new ChatEvent($info->id));
        return $info;
    }



    public function getNewMessage(request $request){
        $findMessage = Chat::where('id',$request->id)->firstOrFail();
        if ($findMessage->to_user_id == null){
            return response()->json([
                'msg'    => $findMessage->text,
                'name'   => $findMessage->user->name,
                'room_id'=> $findMessage->room_id,
                'photo'  => get_user_image($findMessage->user->image),
                'time'   => $findMessage->created_at->diffForHumans(),
                'count'  => Chat::where([['is_read','0'],['room_id',$findMessage->room_id]])->get()->count(),
                'code'=>200],200);
        }else{
            return response()->json(['code'=>400],200);
        }
    }

    public function getOldMessages(request $request){
            $room        = Room::where('id',$request->id)->firstOrFail();
            $allMessages = $room->text;
            $name        = $room->user->name;
            $phone       = $room->user->phone_code.$room->user->phone;
            $photo       = get_user_image($room->user->photo);
            // mark all message as read
            foreach ($allMessages as $message){
                $message->update([
                   'is_read' => '1'
                ]);
                $message->since = $message->created_at->diffForHumans();
            }
            return response()->json([
                'msg'  => $allMessages,
                'name' =>$name,
                'phone'=>$phone,
                'photo'=>$photo,
                'code'=>200
            ],200);
    }


    // end ahmed yahya



    public function getUsers()
    {
        $users = User::paginate(10);
        $output = '
    <table class="table table-bordered table-striped">
	<tr>
		<th width="40%">Username</td>
		<th width="40%">Email</td>

		<th width="20%">Action</td>
	</tr>
';


        foreach ($users as $user){
            $output .= '
	<tr>
		<td>'.$user['name'].'</td>
        <td>'.$user['email'].'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$user['id'].'" data-tousername="'.$user['name'].'">Start Chat</button></td>
	</tr>
	';
        }

        $output .= '</table>';
        return $output;
    }

      public function support(){
        $rooms = Room::orderBy('updated_at','desc')->get();
        $users = User::all();
        foreach ($users as $user){
            $room = Room::where('user_id',$user->id)->first();
            if(!$room){
                $new = new Room();
                $new->user_id = $user->id;
                $new->save();
            }
        }
        return view('Admin/contact/support',compact('rooms'));
    }


}
