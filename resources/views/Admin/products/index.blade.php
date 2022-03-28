@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات المنتجات@endsection
@section('page_name')بيانات المنتجات@endsection
@section('content')
    <form action="{{route('products.create')}}" method="get" >
        <button  type="submit" class="btn btn-primary" >اضافة منتج</button>
    </form>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المنتج</th>
            <th scope="col">صورة المنتج</th>
            <th scope="col">تفاصيل المنتج</th>
            <th scope="col">سعر المنتج</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $index => $product)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$product->title_ar}}</td>
                <td><img src="{{get_file($product->image)}}" style="width: 120px; height: 100px"></td>
                <td>{!! $product->details_ar !!}</td>
                <td>{{$product->price}}</td>
                <td>
                    <form action="{{route('products.edit' , $product->id)}}" method="get">
                        <button class="btn btn-info-gradient">تعديل</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('products.destroy' , $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger"  onclick="return confirm('هل انت متاكد من حذف هذا المنتج ؟')">حذف </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
