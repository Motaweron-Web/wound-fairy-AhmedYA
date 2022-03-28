@extends('layouts/admin/master')
@section('title')لوحة التحكم |اضافة المقال @endsection
@section('page_name')اضافة المقال @endsection
@section('content')
    <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <div class="form-group">
        <label for="title_ar">عنوان المقال :</label><br>
        <input type="text" name="title_ar"  id="title_ar" class="form-control">
    </div>
    <div class="form-group">
        <label for="editor1">تفاصيل المقال :</label><br>
        <textarea id="editor1" name="details_ar"> </textarea>
    </div>
    <div class="form-group">
        <label for="image">الصورة :</label><br>
        <input type="file" name="image" id="image"  class="form-control">
    </div>

    <button type="submit" class="btn btn-success">اضافة</button>
    </form>

@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
