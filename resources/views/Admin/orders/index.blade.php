@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات الاوردرات@endsection
@section('page_name')بيانات الاوردرات@endsection
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المنتج</th>
            <th scope="col">اسم العميل</th>
            <th scope="col">العدد</th>
            <th scope="col">سعر المنتج</th>
            <th scope="col">صورة المنتج</th>
            <th scope="col">الاجمالى</th>
            <th scope="col">الحالة</th>
            <th scope="col">الخريطة</th>
            <th scope="col">العنوان</th>
            <th scope="col">ملاحظة</th>
            <th scope="col">التاريخ</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $index => $order)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$order->product->title_ar}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->price}}</td>

                <td><img src="{{get_file($order->product->image)}}" style="width: 120px; height: 100px"> </td>

                <td>{{$order->amount * $order->price}}  </td>
                <td>
                    <h5>{{$order->status}}</h5>
                    ----------------------------------
                    <form action="{{route('orders.update', $order->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="status">
                            <option disabled selected> select action</option>
                            @if($order->status == 'new')
                                <option value="{{'accepted'}}">accepted</option>
                            @else
                                @foreach(['refused','ended'] as $enum)
                                    <option value="{{$enum}}" {{  $order->status == $enum ? 'selected' : '' }}>{{$enum}}</option>
                                @endforeach
                            @endif
                        </select>
                        <button type="submit" class="btn btn-info-gradient" >حفظ</button>
                    </form>
                </td>
                <td>
                    <?php $a = '@' ?>
                    <a href="https://www.google.com/maps/{{$a}}{{$order->latitude}},{{$order->longitude}},12z"  target="_blank" >
                        <i class="fa fa-map-marker" style="font-size:25px;color:darkgoldenrod"> </i>
                    </a>
                </td>
                <td>{{$order->address}}</td>
                <td>{{$order->note}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form action="{{route('orders.destroy' , $order->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger"  oonclick="return confirm('Are you sure to delete this Order?')">حذف </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
