@extends('layouts/admin/master')
@section('title')لوحة التحكم | المشرفين@endsection
@section('page_name') المشرفين @endsection
@section('content')
    <form action="{{route('admins.update' , $admin->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            <label for="title_ar">الاسم :</label><br>
            <input type="text" name="name" value="{{$admin->name}}"  class="form-control">
        </div>
        <div class="form-group">
            @if($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            <label for="title_ar">الايميل :</label><br>
            <input type="text" name="email" value="{{$admin->email}}"  class="form-control">
        </div>
        <div class="form-group">
            @if($errors->has('image'))
                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
            @endif
            <label for="image">الصورة :</label><br>
            <input type="file" name="image"  id="image" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-info">حفظ</button>
        </div>
    </form>



@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
