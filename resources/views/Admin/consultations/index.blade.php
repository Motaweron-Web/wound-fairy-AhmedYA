@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات الاستشارات@endsection
@section('page_name')بيانات الاستشارات@endsection
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان الاستشارة</th>
            <th scope="col">تفاصيل الاستشارة</th>
            <th scope="col">الصورة</th>
            <th scope="col">النوع </th>
            <th scope="col">التاريخ</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($consultations as $index => $consultation)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$consultation->title_ar}}</td>
                <td width="40%">
                    <p style="word-wrap: break-spaces">
                        {!! $consultation->details_ar !!}
                    </p>
                </td>
                <td><img src="{{get_file($consultation->image)}}" style="width: 200px; height: 100px"> </td>
                <td>{{$consultation->type}}</td>
                <td>{{$consultation->created_at}}
                </td>
                <td>
                    <form action="{{route('consultations.edit' , $consultation->id)}}" method="get">
                        <button class="btn btn-info-gradient">تعديل</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('consultations.destroy' , $consultation->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger"  onclick="return confirm('Are you sure to delete this Consultations?')">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif
@endsection
