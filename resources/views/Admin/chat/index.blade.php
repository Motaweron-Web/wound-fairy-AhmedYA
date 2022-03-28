@extends('layouts/admin/master')
@section('title')لوحة التحكم | الرسائل@endsection
@section('page_name')تفاصيل الرسائل @endsection
@section('content')
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الرسائل المرسلة من العملاء</span>
        </h3>
    </div>
                  <table class="table">
                      <thead class="thead-dark">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">الاسم</th>
                          <th scope="col">الايميل</th>
                          <th scope="col">نوع الرسالة</th>
                          <th scope="col">الرسالة</th>
                          <th scope="col">التاريخ</th>
                          <th scope="col">حذف</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($chats as $index => $chat)
                          <tr>
                              <td scope="row">{{$index +1}}</td>
                              <td>{{$chat->user->name}}</td>
                              <td>{{$chat->user->email}}</td>
                              <td>{{$chat->type}}</td>
                              @if($chat->image == null)
                              <td>{{$chat->text}}</td>
                              @else
                                  <td><img src="{{get_file($chat->image)}}" style="width: 330px; height: 200px"> </td>
                              @endif
                              <td>{{$chat->created_at}}</td>
                              <td>
                                  <form action="{{route('chats.destroy' , $chat->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger"  onclick="return confirm('هل انت متاكد من حذف هذه الرسالة ؟')">حذف</button>
                                  </form>

                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  {{ $chats->links() }}
@endsection
@section('js')
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#users-table').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: '{!! route('contactData') !!}',--}}
{{--                columns: [--}}
{{--                    {data: 'id', name: 'id'},--}}
{{--                    {data: 'name', name: 'name'},--}}
{{--                    {data: 'email', name: 'email'},--}}
{{--                    {data: 'title', name: 'title'},--}}
{{--                    {data: 'message', name: 'message'},--}}
{{--                    {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--                ],--}}
{{--                order: [--}}
{{--                    [0, "desc"]--}}
{{--                ],--}}
{{--                "language": {--}}
{{--                    "sProcessing": "جاري التحميل ..",--}}
{{--                    "sLengthMenu": "اظهار _MENU_ سجل",--}}
{{--                    "sZeroRecords": "لا يوجد نتائج",--}}
{{--                    "sInfo": "اظهار _START_ الى  _END_ من _TOTAL_ سجل",--}}
{{--                    "sInfoEmpty": "لا نتائج",--}}
{{--                    "sInfoFiltered": "للبحث",--}}
{{--                    "sSearch": "بحث :    ",--}}
{{--                    "oPaginate": {--}}
{{--                        "sPrevious": "السابق",--}}
{{--                        "sNext": "التالي",--}}
{{--                    }--}}
{{--                },--}}

{{--                dom: 'Bfrtip',--}}
{{--                buttons: [--}}
{{--                    'print'--}}
{{--                ]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            //Show data in the delete form--}}
{{--            $('#delete_modal').on('show.bs.modal', function (event) {--}}
{{--                var button = $(event.relatedTarget)--}}
{{--                var id = button.data('id')--}}
{{--                var title = button.data('title')--}}
{{--                var modal = $(this)--}}
{{--                modal.find('.modal-body #delete_id').val(id);--}}
{{--                modal.find('.modal-body #title').val(title);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        // Delete Using Ajax--}}
{{--        $(document).on('click', '#delete_btn', function (event) {--}}
{{--            var id = $("#delete_id").val();--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: "{{route('delete_contact')}}",--}}
{{--                data: {--}}
{{--                    '_token': "{{csrf_token()}}",--}}
{{--                    'id': id,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    if (data.success === true) {--}}
{{--                        $("#dismiss_delete_modal")[0].click();--}}
{{--                        $('#users-table').DataTable().ajax.reload();--}}
{{--                        $('<script> notif({msg: "تم حذف الرسالة بنجاح",type: "success"})</' + 'script>').appendTo(document.body);--}}
{{--                    }else{--}}
{{--                        $("#dismiss_delete_modal")[0].click();--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@if(session()->has('message'))
    <script>
        toastr.success("{!! session()->get('message') !!}")
    </script>
@endif
@endsection
