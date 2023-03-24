@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit Reach Us Page </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.reachus.update', $reachus->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="head">Head</label>
        <textarea type="name" class="form-control mb-3" id="head" name="head"  placeholder="open in.." required value="">{{$reachus->head}}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("head");
        </script>

    </div>
    <div class="form-group">
        <label for="phone1">phone1</label>
        <input type="name" class="form-control mb-3" id="phone1" name="phone1"  placeholder="open in.." required value="{{$reachus->phone1}}">
    </div>
    <div class="form-group">
        <label for="phone2">phone2</label>
        <input type="name" class="form-control mb-3" id="phone2" name="phone2"  placeholder="open in.." required value="{{$reachus->phone2}}">
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="name" class="form-control mb-3" id="email" name="email"  placeholder="open in.." required value="{{$reachus->email}}">
    </div>
 
    <br>

    <div class="form-group">
        <label for="img">First IMG</label>
        <img src="{{asset($reachus->f_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="f_img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="img">Last IMG</label>
        <img src="{{asset($reachus->l_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="l_img"  placeholder="Write Body..">
    </div>
     <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
