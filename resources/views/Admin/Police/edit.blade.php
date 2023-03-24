@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit Poilces Page </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.police.update', $police->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="head">Head</label>
        <textarea type="name" class="form-control mb-3" id="head" name="head"  placeholder="open in.." required  >{!!$police->head!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("head");
        </script>

    </div>
    <div class="form-group">
        <label for="img">Head IMG</label>
        <img src="{{asset($police->head_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="head_img" name="head_img"  placeholder="Write Body..">
    </div>
    <br/>
    <hr>
    <br>
    <div class="form-group">
        <label for="f_p_img">First Paragraph IMG</label>
        <img src="{{asset($police->f_p_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="f_p_img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="f_p">First Paragraph</label>
        <textarea type="text" class="form-control mb-3" id="f_p" name="f_p"  placeholder="open in.." required >{!!$police->f_p!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("f_p");
        </script>

    </div>

    <br>
    <hr>
    <br>
    <div class="form-group">
        <label for="second_p">Second Paragraph</label>
        <textarea type="name" class="form-control mb-3" id="second_p" name="second_p"  placeholder="open in.." required  >{!!$police->second_p!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("second_p");
        </script>

    </div>

    <br>
    <hr>
    <br>
    <div class="form-group">
        <label for="third_p_img">3rd Paragarph IMG</label>
        <img src="{{asset($police->third_p_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="third_p_img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="third_p">3rd Paragarph</label>
        <textarea type="name" class="form-control mb-3" id="third_p" name="third_p"  placeholder="open in.." required  >{!!$police->third_p!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("third_p");
        </script>

    </div>

    <br>
    <hr>
    <br>
    <div class="form-group">
        <label for="parent_img">Parentrs IMG</label>
        <img src="{{asset($police->parent_img)}}" alt="" style="width: 100px;height: 100px;display: block;margin-bottom: 20px;border-radius: 5px">
        <input type="file" class="form-control" id="img" name="parent_img"  placeholder="Write Body..">
    </div>
    <div class="form-group">
        <label for="parent_h">Parentrs Head</label>
        <textarea type="name" class="form-control mb-3" id="parent_h" name="parent_h"  placeholder="open in.." required  >{!!$police->parent_h!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("parent_h");
        </script>

    </div>

    <div class="form-group">
        <label for="parent_p">Parentrs Paragraph</label>
        <textarea type="name" class="form-control mb-3" id="parent_p" name="parent_p"  placeholder="open in.." required  >{!!$police->parent_p!!}</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("parent_p");
        </script>

    </div>

    <br>
    <hr>
    <br>

 

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @push("styles")

  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
  @endpush
  @endsection
