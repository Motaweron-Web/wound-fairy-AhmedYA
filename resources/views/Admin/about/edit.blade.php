@extends('layouts/admin/master')
@section('title')لوحة التحكم | About us@endsection
@section('page_name') About us @endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <form action="{{route('abouts.update' , $about->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title_ar">العنوان  :</label><br>
            <input type="text" name="title_ar" value="{{$about->title_ar}}" id="title_ar" class="form-control">
        </div>
        <div class="form-group">
            <label for="details_ar">التفاصيل :</label><br>
            <textarea id="editor1" name="details_ar">{{$about->details_ar}}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook">الصورة </label><br>
            <input type="file" name="image"  id="image" class="form-control">
        </div>
            <button class="btn btn-info" type="submit">حفظ</button>
    </form>
    </div>


@endsection
@section('js')


    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
