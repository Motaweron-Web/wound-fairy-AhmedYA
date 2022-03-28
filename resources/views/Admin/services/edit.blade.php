@extends('layouts/admin/master')
@section('title')لوحة التحكم | Services Edit@endsection
@section('page_name') Services Edit @endsection
@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">الاسم</th>
            <th scope="col">حفظ</th>

        </tr>
        </thead>
        <tbody>

            <tr>
                <form action="{{route('services.update' , $service->id)}}" method="post">
                    @csrf
                    @method('PUT')
                <td><input type="text" name="service_title" value="{{$service->title_ar}}"></td>
                    <td>  <button class="btn btn-info">حفظ</button></td>
                </form>
            </tr>
        </tbody>
    </table>

@endsection
