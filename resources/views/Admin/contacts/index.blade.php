@extends('layouts/admin/master')
@section('title')لوحة التحكم | Contact@endsection
@section('page_name')Contact@endsection
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الايميل</th>
            <th scope="col">عنوان الرسالة</th>
            <th scope="col">الرسالة</th>
            <th scope="col">التاريخ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $index => $contact)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
                <td>{{$contact->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
@endsection
