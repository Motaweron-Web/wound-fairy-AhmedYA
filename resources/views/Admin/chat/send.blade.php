@extends('layouts/admin/master')
@section('title')
    لوحة التحكم | الدعم الفنى
@endsection
@section('page_name')
    الدعم الفنى
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="chatbox">
        <div class="card overflow-hidden">
            <div class="row">
                <div class="col-md-12 col-lg-5 col-xl-4 pl-lg-0 pr-lg-1 border-left">
                    <div class="chat-search">
                        <div class="input-group">
                            <input type="text" class="form-control  bg-white" placeholder="بحث عن مستخدم .."
                                   onkeyup="searchFunction()" id="searchBar">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="contacts_body p-0" style="max-height: 400px;overflow-y: scroll">
                        <input type="hidden" id="room_id">
                        <ul class="contacts mb-0">
                            @foreach($rooms as $room)
                            <li class="myRoom" id="{{$room->id}}" style="cursor: pointer">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="{{get_user_image($room->user->image)}}" class="rounded-circle user_img" alt="img">
                                    </div>
                                    <div class="user_info">
                                        <h6 class="mt-1 mb-1 nameOfUser">{{$room->user->name}}<span class="dot-label bg-success mr-2"></span></h6>
                                        @if($room->user->sentChat->last())
                                        <span class="">{{ \Illuminate\Support\Str::limit($room->user->sentChat->last()->text,30)}}</span>
                                        @endif
                                    </div>
                                    <div class="float-left text-left mr-auto mt-auto mb-auto text-center">
                                        @if($room->user->sentChat->count())
                                            <small class="messageTime">{{ (($room->user->sentChat->last()->created_at)->diffForHumans()) ?? ''}}</small>
                                        @else
                                            <small class="messageTime"></small>
                                        @endif
                                        <br>
                                        @if($room->user->sentChat->where('is_read','0')->count() > 0)
                                            <span class="badge badge-success badge-pill" id="unreadCount">{{$room->user->sentChat->where('is_read','0')->count()}}</span>
                                        @else
                                            <!-- To use it when receive new message (go to line 227)-->
                                            <span class="badge badge-success badge-pill" id="unreadCount"></span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7 col-xl-8 chat pr-lg-0 pl-lg-0">
                    <div class="card shadow-none  mb-0 border-0">
                        <div class="action-header clearfix">
                            <div class="float-right hidden-xs d-flex mr-2">
                                <div class="img_cont ml-3">
                                    <img id="user_photo" src="{{asset('uploads/fav1.png')}}" class="rounded-circle user_img" alt="img">
                                </div>
                                <div class="align-items-center mt-2">
                                    <h4 class="font-weight-semibold mb-1" id="user_name">وند فيري</h4>
                                    <span class="dot-label bg-success"></span><span class="mr-3">متصل الان</span>
                                </div>
                            </div>
                            <ul class="ah-actions actions align-items-center">
                                <li class="call-icon d-none" id="phoneContainer">
                                    <a href="#" class="d-done d-md-flex" id="user_phone">
                                        <i class="icon icon-phone"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- ACTION HEADER END -->
                        <!-- MSG CARD-BODY OPEN -->
                        <div class="card-body msg_card_body" id="chatBody">
                            <img style="width: 100%;height: 200px;object-fit: contain" src="{{asset('assets/default/img/text.gif')}}">
{{--                            <div class="chat-box-single-line">--}}
{{--                                <abbr class="timestamp">February 1st, 2019</abbr>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex justify-content-start">--}}
{{--                                <div class="img_cont_msg">--}}
{{--                                    <img src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/users/10.jpg" class="rounded-circle user_img_msg" alt="img">--}}
{{--                                </div>--}}
{{--                                <div class="msg_cotainer">--}}
{{--                                    Hi, how are you Jenna Side?--}}
{{--                                    <span class="msg_time">8:40 AM, Today</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <div class="msg_cotainer_send">--}}
{{--                                    But I must explain to you how all this mistaken born and I will give some images below--}}
{{--                                    <span class="msg_time_send">9:10 AM, Today</span>--}}
{{--                                    <div class="row mt-2">--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="img-fluid rounded" src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/media/8.jpg" alt="banner image">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="img-fluid rounded" src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/media/9.jpg" alt="banner image">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-4">--}}
{{--                                            <img class="img-fluid rounded" src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/media/10.jpg" alt="banner image">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="img_cont_msg">--}}
{{--                                    <img src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/users/15.jpg" class="rounded-circle user_img_msg" alt="img">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex justify-content-start">--}}
{{--                                <div class="img_cont_msg">--}}
{{--                                    <img src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light-rtl/assets/images/users/10.jpg" class="rounded-circle user_img_msg" alt="img">--}}
{{--                                </div>--}}
{{--                                <div class="msg_cotainer">--}}
{{--                                    Okay Bye, text you later..--}}
{{--                                    <span class="msg_time">9:12 AM, Today</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <!-- MSG CARD-BODY END -->
                        <!-- CARD-FOOTER OPEN -->
                        <div class="card-footer">
                            <div class="input-group d-none" id="inputContainer">
                                <textarea id="chat-input" rows="3" type="text" class="form-control" placeholder="اكتب رسالتك ..."></textarea>
                                <span class="input-group-append">
                                    <button class="btn btn-lg btn-primary" type="button" id="my-chat-submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </span>
                            </div>
                        </div><!-- CARD FOOTER END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection
@section('js')
    <script src="{{asset('admin/pusher/pusher.min.js')}}"></script>
    <script>
        var chatBody = $("#chatBody");
        $(function () {
            var INDEX = 0;
            $("#my-chat-submit").click(function (e) {
                e.preventDefault();
                var msg = $("#chat-input").val();
                if (msg.trim() == '') {
                    return false;
                }
                var room_id = $('#room_id').val();
                sendMessage(msg,room_id)
            });

            function sendMessage(msg,room_id) {
                $.post('{{url('admin/sendAdminMessage')}}', {
                    "msg": msg,
                    "room_id": room_id,
                    "_token": "{{csrf_token()}}"
                }, function (data) {
                    if (data.code == 200) {
                        generate_message(msg, 'self', data.info);
                    } else {
                        toastr.info("نأسف حدث خطأ ...")
                    }

                    if (data.status === 500)
                        toastr.info("نأسف حدث خطأ ...")
                })
            }


            function generate_message(msg, type, info) {
                var str = `
                    <div class="d-flex justify-content-start">
                        <div class="msg_cotainer_send">
                            ${msg}
                            <span class="msg_time">${info.since}</span>
                        </div>
                    </div>
            `;
                chatBody.append(str);
                if (type == 'self') {
                    $("#chat-input").val('');
                }
                chatBody.animate({scrollTop: $('#chatBody').prop("scrollHeight")}, 1000);
            }
        })
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('c6d3b2522ed3ba350520', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('Pusher_first');
        channel.bind('App\\Events\\ChatEvent', function (data) {
            if (data.message) {
                getNewMessage(data.message)
            }
        });

        function getNewMessage(id) {
            $.get("{{route('getNewMessage')}}", {"id": id}, function (data) {
                let room_id = $('#room_id').val()
                if(data.code == 200){
                    var audio = new Audio("{{asset('assets/success.mp3')}}");
                    audio.play();
                    if (data.room_id == room_id){
                        var str = `
                            <div class="d-flex justify-content-end">
                                <div class="msg_cotainer">
                                    ${data.msg}
                                    <span class="msg_time">${data.time}</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="${data.photo}" class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                            `;
                        chatBody.append(str);
                    }else{
                        $('.myRoom#'+data.room_id).find('#unreadCount').text(data.count)
                        $('.myRoom#'+data.room_id).find('.messageTime').text(data.time)
                    }

                }
                chatBody.animate({scrollTop: $('#chatBody').prop("scrollHeight")}, 1000);
            })
        }

        function searchFunction() {
            var input, filter, container, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value;
            for (i = 0; i < $('.myRoom').length; i++) {
                userName = $('.nameOfUser')[i].innerText;
                if (userName) {
                    if (userName.includes(filter)) {
                        $('.myRoom')[i].style.display = "";
                    } else {
                        $('.myRoom')[i].style.display = "none";
                    }
                }
            }
        }

        $('.myRoom').on('click', function (e) {
            $('.myRoom').removeClass('active')
            $(this).find('#unreadCount').text('')
            $('#inputContainer').removeClass('d-none')
            $('#phoneContainer').removeClass('d-none')
            $(this).addClass('active')
            $('#room_id').val(this.id)
            e.preventDefault();
            $.ajax({
                url: `{{route('getOldMessages')}}`,
                type: 'GET',
                data: {
                    'id': this.id
                },
                dataType: 'json',
                success: function (data) {
                    $('#user_name').text(data.name);
                    $('#user_photo').attr('src',data.photo);
                    $('#user_phone').attr('href','tel:'+data.phone);
                    if (data.msg.length) {
                        chatBody.empty();
                        let type = 0;
                        for (let i = 0; i < data.msg.length; i++) {
                            if (data.msg[i]['to_user_id'] == null) {
                                type = 0;
                            } else {
                                type = 1;
                            }
                            checkMessageSender(type, data.msg[i]['text'], data.msg[i]['since'], data.name, data.photo)
                        }
                        chatBody.animate({scrollTop: $('#chatBody').prop("scrollHeight")}, 1000);
                    } else {
                        chatBody.empty();
                        chatBody.append('<img style="width: 100%;height: 200px;object-fit: contain" src="{{asset('assets/default/img/text.gif')}}">')
                    }
                },
                error: function () {
                    alert("عذرا لقد حدث مشكلة غير متوقعة");
                }
            });
        });

        function checkMessageSender(type, msg, since, name, photo) {
            if (type === 1) {
                var str = `
                    <div class="d-flex justify-content-start">
                        <div class="msg_cotainer_send">
                            ${msg}
                            <span class="msg_time">${since}</span>
                        </div>
                    </div>
                `;
            } else {
                if (photo == null) {
                    photo = "{{ URL::asset('assets/default/img/avatar.png') }}"
                }
                str = `
                            <div class="d-flex justify-content-end">
                                <div class="msg_cotainer">
                                    ${msg}
                                    <span class="msg_time">${since}</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="${photo}" class="rounded-circle user_img_msg" alt="img">
                                </div>
                            </div>
                `
            }
            chatBody.append(str);
        }
    </script>

@endsection
