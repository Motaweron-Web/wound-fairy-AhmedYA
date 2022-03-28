@extends('layouts/admin/master')
@section('title')لوحة التحكم |تعديل المقالات@endsection
@section('page_name')تعديل المقال @endsection
@section('content')



    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">اسم المنتج</th>
            <th scope="col">تفاصيل المقال</th>
            <th scope="col">الصوره</th>
            <th scope="col">سعر المنتج</th>
            <th scope="col">تعديل</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <form action="{{route('products.update' , $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <td><input type="text" value="{{$product->title_ar}}" name="title_ar"></td>
                <td>
                    <textarea id="editor1" name="details_ar"> {{$product->details_ar}}</textarea>
                </td>
                <td><input type="file" name="image"></td>
                <td><input type="number" value="{{$product->price}}" name="price"></td>
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
