@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit Welcome Page </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.welcome.update', $welcome->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="img">IMG</label>
        <img src="{{asset($welcome->img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="open_in">open in</label>
        <input type="name" class="form-control mb-3" id="open_in" name="open_in"  placeholder="open in.." required value="{{$welcome->open_in}}">
    </div>
    <div class="form-group">
        <label for="desc">Desc</label>
        <textarea type="name" class="form-control mb-3" id="desc" name="desc"  placeholder="open in.." required value="">{{$welcome->desc}}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("desc");
        </script>
        
    </div>

    <br>

    <div class="form-group">
        <label for="img">IMG</label>
        <img src="{{asset($welcome->his_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="his_img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="his_desc">History Description</label>
        <textarea type="name" class="form-control mb-3" id="his_desc" name="his_desc"  placeholder="open in.." required value="">{{$welcome->his_desc}}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("his_desc");
        </script>

    </div>

    <br>

    <div class="form-group">
        <label for="img">Mission Img</label>
        <img src="{{asset($welcome->mis_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="mis_img"   >
    </div>
    <div class="form-group">
        <label for="mis_desc">Mission Description</label>
        <textarea type="name" class="form-control mb-3" id="mis_desc" name="mis_desc"  placeholder="open in.." required value="">{{$welcome->mis_desc}}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("mis_desc");
        </script>


    </div>

    <br>

    <div class="form-group">
        <label for="img">Mission Img</label>
        <img src="{{asset($welcome->vis_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="vis_img"   >
    </div>
    <div class="form-group">
        <label for="vis_desc">Mission Description</label>
        <textarea type="name" class="form-control mb-3" id="vis_desc" name="vis_desc"  placeholder="open in.." required value="">{{$welcome->vis_desc}}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("vis_desc");
        </script>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @push("styles")
  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
  @endpush
  @endsection
