@extends('layouts/admin/master')
@section('title')لوحة التحكم |About us@endsection
@section('page_name')About us@endsection
@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">العنوان</th>
            <th scope="col" >الوصف</th>
            <th scope="col">الصورة</th>
            <th scope="col">تعديل</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$about->title_ar}}</td>
                <td width="50%"><p style="word-break: break-word"> {!! $about->details_ar !!}</p></td>
                <td><img src="{{get_file($about->image)}}" style="width: 300px; height: 150px"> </td>
                <form action="{{route('abouts.edit', $about->id)}}" method="get">
                    <td><button name="edit" type="submit" class="btn btn-info" >تعديل</button></td>
                </form>
            </tr>
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
