@extends('layouts/admin/master')
@section('title')لوحة التحكم | الاعدادات@endsection
@section('page_name') الاعادادت @endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <form action="{{route('consultations.update' , $consultation->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title_ar">عنوان الاستثارة :</label><br>
            <input type="text" name="title_ar" value="{{$consultation->title_ar}}" id="title_ar" class="form-control">
        </div>
        <div class="form-group">
            <label for="details_ar">تفاصيل الاستشارة :</label><br>
            <textarea id="editor1" name="details_ar">{{$consultation->details_ar}}</textarea>
        </div>

        <div class="form-group">
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
