@extends('layouts/admin/master')
@section('title')لوحة التحكم | بيانات الحجوزات السابقة@endsection
@section('page_name')بيانات الحجوزات السابقة@endsection
@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الشكوي</th>

            <th scope="col">الخدمة</th>
            <th scope="col">الاسم </th>
            <th scope="col"> رقم الموبايل</th>
            <th scope="col">التاريخ</th>
            <th scope="col">الحالة</th>
            <th scope="col">الموقع</th>
            <th scope="col">العنوان</th>
            <th scope="col">تفاصيل</th>
            <th scope="col">حذف</th>

        </tr>
        </thead>
        <tbody>

        @foreach($reservations as $index => $reservation)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$reservation->complaint}}</td>

                <td>{{$reservation->service->title_ar}}</td>
                <td>{{$reservation->user->name}}</td>
                <td>{{ $reservation->user->phone}}</td>
                <td>{{date("Y-m-d H:i:s", $reservation->date_time)}}</td>
                <td><h5>{{$reservation->status}}</h5>
                </td>

                <td>
                    <?php $a = '@' ?>
                    <a href="https://www.google.com/maps/{{$a}}{{$reservation->latitude}},{{$reservation->longitude}},12z"  target="_blank" >
                        <i class="fa fa-map-marker" style="font-size:25px;color:darkgoldenrod"> </i>
                    </a>
                </td>
                <td>{{$reservation->address}}</td>
                <td>
                    <form action="{{route('reservations.show' , $reservation->id)}}" method="get">
                        <button class="btn btn-info">تفاصيل</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('reservations.destroy' , $reservation->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger"  onclick="return confirm('Are you sure to delete this Reservation?')">حذف</button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    {{ $reservations->links() }}

@endsection
@section('js')
    @if(session()->has('message'))
        <script>
            toastr.success("{!! session()->get('message') !!}")
        </script>
    @endif

@endsection
