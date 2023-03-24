@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add Nwe Slider </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="img">IMG</label>
        <input type="file" class="form-control" id="img" name="img"  placeholder="Write Body.." required>
    </div>
    <div class="form-group">
        <label for="name">Head</label>
        <textarea type="name" class="form-control" id="name" name="head"  placeholder="Write Head.." required></textarea>
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
