@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">Videos</h2>
<a href="{{route('admin.videos.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New Video</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($videos->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">name</th>
                    <th class="border-top-0">Video</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                <tr>
                    <td>{{$video->id}}</td>
                    <td style="">
                        {{$video->name}}
                    </td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('video.png')}}"> <img src="{{asset('video.png')}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.videos.destroy', $video->id)}}" method="post">
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
