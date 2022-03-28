@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات العملاء@endsection
@section('page_name')بيانات العملاء@endsection
@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">رقم الموبايل</th>
            <th scope="col">الايميل</th>
            <th scope="col">الصورة</th>
            <th scope="col">تاريخ التسجيل</th>
            <th scope="col">حظر</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
        <tr>
            <th scope="row">{{$index +1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->phone_code}} {{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td><img src="{{get_file($user->image)}}" style="width: 60px; height: 60px"> </td>
            <td>{{$user->created_at}}</td>
            <td>
                @if($user->is_blocked  == 0)
             <form action="{{route('users.block', $user->id)}}" method="post">
                @method('PUT')
                @csrf
                <button name="block" type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to block this user ?')">حظر</button>
             </form>
              @endif

                @if($user->is_blocked  == 1)
                <form action="{{route('users.unblock', $user->id)}}" method="post">
                   @method('PUT')
                     @csrf
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to unblock this user ?')">الغاء الحظر</button>
                        </form>
                @endif

            </td>
            <td>
            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-danger"   onclick="return confirm('Are you sure to delete this user ?')">حذف</button>

            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
