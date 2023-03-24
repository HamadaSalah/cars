@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit Slider </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.slider.update', $slider->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="img">IMG</label>
        <img src="{{asset($slider->img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="name">Head</label>
        <textarea type="name" class="form-control mb-3" id="name" name="head"  placeholder="Write Head.." value="">{!!$slider->head!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("head");
        </script>
        
     </div>
 
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("styles")
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
@endpush
@endsection
