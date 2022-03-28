@extends('layouts/admin/master')
@section('title')لوحة التحكم | المشرفين@endsection
@section('page_name') المشرفين @endsection
@section('content')

    <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            <label for="name">الاسم :</label><br>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            @if($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            <label for="email">الايميل :</label><br>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            @if($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
            <label for="password">كلمة المرور :</label><br>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            @if($errors->has('image'))
                <div class="alert alert-danger">{{ $errors->first('image')}}</div>
            @endif
            <label for="image">الصورة :</label><br>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-info">اضافة</button>
        </div>
    </form>

@endsection

