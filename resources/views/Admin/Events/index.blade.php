@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">Home Events</h2>
<a href="{{route('admin.events.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  New Event</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($events->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Title</th>
                    <th class="border-top-0">exmaple</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{$event->loop+1}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->example}}</td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.events.destroy', $event->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        <a href="{{Route('admin.events.edit', $event->id)}} ">
                            <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        </a>

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
