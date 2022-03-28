@extends('layouts/admin/master')
@section('title')لوحة التحكم | المقالات@endsection
@section('page_name')تفاصيل المقالات @endsection
@section('content')
    <form action="{{route('blogs.create')}}" method="get" >
        <button  type="submit" class="btn btn-primary" >اضافة مقال</button>
    </form>
<br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان المقال</th>
            <th scope="col">تفاصيل المقال</th>
            <th scope="col">الصوره</th>
            <th scope="col">التاريخ</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $index => $blog)
            <tr>
                <td scope="row">{{$index +1}}</td>
                 <td>{{$blog->title_ar}}</td>
                <td width="40%">
                    <p style="word-wrap: break-spaces">
                        {!! $blog->details_ar !!}
                    </p>
                </td>
                  <td><img src="{{get_file($blog->image)}}" style="width: 220px; height: 120px"> </td>
                <td>{{$blog->created_at}}</td>
                <td>
                <form action="{{route('blogs.edit' , $blog->id)}}" method="get">

                 <button class="btn btn-info-gradient">تعديل</button>

                </form>

                </td>
                <td>
                    <form action="{{route('blogs.destroy' , $blog->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"  onclick="return confirm('Are you sure to delete this Blog?')">حذف</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
