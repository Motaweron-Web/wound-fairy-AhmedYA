@extends('layouts/admin/master')
@section('title')لوحة التحكم | تفاصيل الحجز@endsection
@section('page_name') تفاصيل الحجز @endsection
@section('content')

        <div class="form-group" >
            <p style="font-size: 20px">الشكوي : <span style="color: firebrick; font-size: 20px" > {{$reservation->complaint}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">الخدمة : <span style="color: firebrick; font-size: 20px" > {{$reservation->service->title_ar}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">الاسم : <span style="color: firebrick; font-size: 20px" > {{$reservation->user->name}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">رقم الموبايل : <span style="color: firebrick; font-size: 20px" > {{ $reservation->user->phone}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">التاريخ : <span style="color: firebrick; font-size: 20px" > {{date("Y-m-d H:i:s", $reservation->date_time)}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">الحالة : <span style="color: firebrick; font-size: 20px" > {{$reservation->status}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">الموقع : <span style="color: firebrick; font-size: 20px" > <a href=""> <i class="fa fa-map-marker" style="font-size:25px;color:darkgoldenrod"></i></a></span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">العنوان : <span style="color: firebrick; font-size: 20px" > {{$reservation->address}}</span></p>
        </div>
        <div class="form-group">
            <p style="font-size: 20px">الصور :  </p>
{{--            <?php $images =  json_decode($reservation->images,true) ?>--}}
{{--            @foreach ($images as $image)--}}
{{--                <img src="{{ url('images/'.$image) }}"/>--}}
{{--            @endforeach--}}
            @foreach(json_decode($reservation->images) as $path)
                <img src="{{ get_file($path) }}" style="width: 240px" height="120px">
            @endforeach
        </div>


    </div>


@endsection
