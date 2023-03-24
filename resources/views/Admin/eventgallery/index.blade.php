@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">New Events Img</h2>
<a href="{{route('admin.eventgallery.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New IMG</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($gallerys->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Img</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gallerys as $gallery)
                <tr>
                    <td>{{$gallery->loop+1}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset($gallery->img)}}"> <img src="{{asset($gallery->img)}}" style="width: 100px;height: 100px;" class="img-thumbnail" alt=""></a>    
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.eventgallery.destroy', $gallery->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    @else
        <div class="text-center">No Data Available</div> 
    @endif
@endsection
