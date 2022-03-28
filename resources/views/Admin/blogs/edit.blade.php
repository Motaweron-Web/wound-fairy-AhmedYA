@extends('layouts/admin/master')
@section('title')لوحة التحكم |تعديل المقالات@endsection
@section('page_name')تعديل المقال @endsection
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />



    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">عنوان المقال</th>
            <th scope="col">تفاصيل المقال</th>
            <th scope="col">الصوره</th>
            <th scope="col">تعديل</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{route('blogs.update' , $blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <td><input type="text" value="{{$blog->title_ar}}" name="title_ar"></td>
              <td>
                 <textarea id="editor1" name="details_ar"> {{$blog->details_ar}}</textarea>
              </td>
            <td><input type="file" name="image"></td>
            <td>
               <button type="submit" class="btn btn-success">حفظ</button>
                </td>
                </form>
            </tr>

        </tbody>
    </table>




@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
