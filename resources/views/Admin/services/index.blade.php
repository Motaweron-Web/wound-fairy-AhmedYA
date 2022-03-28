@extends('layouts/admin/master')
@section('title')لوحة التحكم | الخدمات@endsection
@section('page_name')الخدمات @endsection
@section('content')
    <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <a href="#sliderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle btn btn-bitbucket">اضافة خدمة</a>

        <ul class="collapse list-unstyled" id="sliderSubmenu">
            <br>
            <li>
                <input type="text" name="name">
            </li>
            <br>
            <button type="submit" class="btn btn-dark">
                اضافة </button>
        </ul>
    </form>
<br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">تعدل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $index => $service)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$service->title_ar}}</td>
                <td>
                    <form action="{{route('services.edit' , $service->id)}}" method="get">
                        <button class="btn btn-info-gradient">تعديل</button>
                    </form>

                </td>
                <td>
                    <form action="{{route('services.destroy' , $service->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"  onclick="return confirm('Are you sure to delete this Service?')">حذف</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $services->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
