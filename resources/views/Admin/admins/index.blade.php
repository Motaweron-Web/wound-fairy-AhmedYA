@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات العملاء@endsection
@section('page_name')بيانات العملاء@endsection
@section('content')

    <form action="{{route('admins.create')}}" method="get" >
        <button  type="submit" class="btn btn-primary" >اضافة مشرف</button>
    </form>
    <br>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الايميل</th>
            <th scope="col">الصورة</th>
            <th scope="col">تاريخ التسجيل</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $index => $admin)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td><img src="{{get_file($admin->photo)}}" style="width: 60px; height: 60px"> </td>
                <td>{{$admin->created_at}}</td>
                <form action="{{route('admins.edit', $admin->id)}}" method="get">
                    <td><button  type="submit" class="btn btn-info" >تعديل</button></td>
                </form>
                <form action="{{route('admins.destroy' , $admin->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                  <td>     <button  class="btn btn-danger"  onclick="return confirm('Are you sure to delete this Admin?')">حذف</button>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $admins->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
