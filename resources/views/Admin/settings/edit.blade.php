@extends('layouts/admin/master')
@section('title')لوحة التحكم | الاعدادات@endsection
@section('page_name') الاعادادت @endsection
@section('content')
    <form action="{{route('settings.update' , $setting->id)}}" method="post">
        @csrf
        @method('PUT')
<div class="form-group">
    <label for="terms">الشروط :</label><br>
    <input type="text" name="terms" value="{{$setting->terms}}" id="terms" class="form-control">
</div>
<div class="form-group">
    <label for="privacy">الخصوصية :</label><br>
    <input type="text" name="privacy" value="{{$setting->privacy}}" id="privacy" class="form-control">
</div>
<div class="form-group">
    <label for="facebook">فيس بوك :</label><br>
    <input type="text" name="facebook" value="{{$setting->facebook}}" id="facebook" class="form-control">
</div>
<div class="form-group">
    <label for="insta">انستجرام :</label><br>
    <input type="text" name="insta" value="{{$setting->insta}}" id="insta" class="form-control">
</div>
<div class="form-group">
    <label for="twitter">تويتر :</label><br>
    <input type="text" name="twitter" value="{{$setting->twitter}}" id="twitter" class="form-control">
</div>
<div class="form-group">
    <label for="linkedin">لينكدان :</label><br>
    <input type="text" name="linkedin" value="{{$setting->linkedin}}" id="linkedin" class="form-control">
</div>
<div class="form-group">
    <label for="online_price">سعر الشات :</label><br>
    <input type="number" name="online_price" value="{{$setting->online_price}}" id="online_price" class="form-control">
</div>
<div class="form-group">
    <label for="home_visit_price">سعر الزياره المنزلية :</label><br>
    <input type="number" name="home_visit_price" value="{{$setting->home_visit_price}}" id="home_visit_price" class="form-control">
</div>
<div class="form-group">

    <button class="btn btn-info">حفظ</button>
    </form>
</div>


@endsection
