@extends('Admin.master')
@section('content')
<style>
    input, label, h2, button{
        text-align: right;
        float: right;
    }
</style>
<h2 >اضافة مستخدم جديد </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">الاسم</label>
        <input type="name" class="form-control" id="name" name="name"  required>
    </div>
    <div class="form-group">
        <label for="email">البردي الالكتروني</label>
        <input type="email" class="form-control" id="email" name="email"  required>
    </div>
    <div class="form-group">
        <label for="password">كلمة السر</label>
        <input type="password" class="form-control" id="password" name="password"  required>
    </div>
     <button style="margin: 50px 0;width: 100%" type="submit" class="btn btn-primary">اضافة</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
