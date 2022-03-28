<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;

class ListMessages extends Component
{


    public function render()
    {
        $users = User::paginate(8);
        return view('livewire.admin.messages.list-messages',compact('users'))->extends('layouts/admin/master')
            ->section('content');
    }
    public function viewMessage($conversationId)
    {
       $messages = Chat::where('from_user_id' , $conversationId)->get();
        return view('livewire.admin.messages.list-messages',compact('messages'));

    }
    public function change()
    {
       return $this->title = 'haitham';
    }
}
