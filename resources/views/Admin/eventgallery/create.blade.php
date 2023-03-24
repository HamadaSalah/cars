@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add New Event Img </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.eventgallery.store')}}" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="IMG">IMG</label>
        <input type="file" class="form-control" id="IMG" name="img"   required >
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
