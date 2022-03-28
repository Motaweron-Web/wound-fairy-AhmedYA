<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(7);
        return view('Admin.users.index', compact('users'));
    }
    public function block_users($id)
    {
        $user = User::find($id);
        if($user->is_bloked == 0){
        $user->update([
            'is_blocked' => 1
        ]);
            return redirect()->back()->with('message','تم حظر بنجاح '.$user->name . '!');
        }
        else
            $user->update([
                'is_blocked' => 0
            ]);
        return redirect()->back()->with('message','تم الغاء حظر بنجاح '.$user->name . '!');
    }
    public function unblock_users($id)
    {
        $user = User::find($id);
        $user->update([
            'is_blocked' => 0
        ]);
        return redirect()->back()->with('message','تم الغاء حظر بنجاح '.$user->name . '!');
    }
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->back()->with('message','تم حذف اليوزر بنجاخ');
    }
}
