@extends('layouts/admin/master')
@section('title')لوحة التحكم | البانر المتحرك@endsection
@section('page_name')البانر المتحرك @endsection
@section('content')

    <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <a href="#sliderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle btn btn-bitbucket">اضافة بانر متحرك</a>

        <ul class="collapse list-unstyled" id="sliderSubmenu">
            <br>
            <li>
               <input type="file" name="image">
            </li>
            <br>
          <button type="submit" class="btn btn-dark">
             اضافة </button>
        </ul>
    </form>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الصورة</th>
            <th scope="col" colspan="2">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $index => $slider)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td><img src="{{get_file($slider->image)}}" style="width: 500px; height: 250px"> </td>
                <td colspan="2">
                    <form action="{{route('sliders.update' , $slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="image">
                        <button class="btn btn-info-gradient">حفظ</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('sliders.destroy' , $slider->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger"  onclick="return confirm('Are you sure to delete this image?')">حذف</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $sliders->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
