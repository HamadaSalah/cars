@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add Nwe Slider </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.videos.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <textarea type="name" class="form-control" id="name" name="name"  placeholder="Write Nme.." required></textarea>
    </div>
    <div class="form-group">
        <label for="video">Video</label>
        <input type="file" class="form-control" id="video" name="video"   required accept=".mp4">
    </div>
     
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

 @endsection
