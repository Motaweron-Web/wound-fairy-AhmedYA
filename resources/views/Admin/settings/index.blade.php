@extends('layouts/admin/master')
@section('title')لوحة التحكم | الاعدادات@endsection
@section('page_name') الاعادادت @endsection
@section('content')
    <form action="{{route('settings.update' , $settings->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="terms">الشروط :</label><br>
            <textarea id="editor1" name="terms">{{$settings->terms}}</textarea>
        </div>
        <div class="form-group">
            <label for="privacy">الخصوصية :</label><br>
            <textarea id="editor2" name="privacy"> {{$settings->privacy}}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook">فيس بوك :</label><br>
            <input type="text" name="facebook" value="{{$settings->facebook}}" id="facebook" class="form-control">
        </div>
        <div class="form-group">
            <label for="insta">انستجرام :</label><br>
            <input type="text" name="insta" value="{{$settings->insta}}" id="insta" class="form-control">
        </div>
        <div class="form-group">
            <label for="twitter">تويتر :</label><br>
            <input type="text" name="twitter" value="{{$settings->twitter}}" id="twitter" class="form-control">
        </div>
        <div class="form-group">
            <label for="linkedin">لينكدان :</label><br>
            <input type="text" name="linkedin" value="{{$settings->linkedin}}" id="linkedin" class="form-control">
        </div>
        <div class="form-group">
            <label for="online_price">سعر الشات :</label><br>
            <input type="number" name="online_price" value="{{$settings->online_price}}" id="online_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="home_visit_price">سعر الزياره المنزلية :</label><br>
            <input type="number" name="home_visit_price" value="{{$settings->home_visit_price}}" id="home_visit_price" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-info">حفظ</button>
         </div>
    </form>
    @endsection
    @section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
@endsection
