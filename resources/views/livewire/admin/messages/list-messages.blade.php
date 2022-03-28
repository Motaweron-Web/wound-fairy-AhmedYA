
<div class="container" >
    <div class="pt-2 row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contacts</h3>
                </div>
                <div class="card-body">
                    <ul class="contacts-list">
                        @foreach($users as $user)
                            <a href="#"  wire:click="viewMessage({{$user->id}})">
                        <li class="" >
                                <img class="contacts-list-img" src="http://localhost:8000/noimage.png" alt="User Avatar">
                                <div class="contacts-list-info">
                                    <span class="contacts-list-name text-dark">
                                        {{$user->name}}
                                    </span>
                                </div>
                                <!-- /.contacts-list-info --></button>
                        </li>
                            </a>
                            <hr>
                        @endforeach
                    </ul>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Chat with
                        <span>
                            Rossie Hoeger
                        </span>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" id="conversation">
                        <!-- Message. Default to the left -->
{{--                        @foreach($messages as $message)--}}
                        <div class="direct-chat-msg right">

                            <div class="clearfix direct-chat-infos">

                                <span class="float-left direct-chat-name">You</span>

                                <span class="float-right direct-chat-timestamp">2020-2-13</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="http://localhost:8000/storage/avatars/24HCF7MiZIgETjLJ1PUddPPseAWDSJEW9jVRRiy1.png" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                               hi
                            </div>
                        <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                    </div>
                    <!--/.direct-chat-messages-->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form action="#">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
</div>
