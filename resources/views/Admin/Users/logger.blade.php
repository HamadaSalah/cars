@extends('Admin.master')
@section('content')
 <div class="table-responsive">
    <table class="table user-table no-wrap" style="float: right;text-align: right;direction: rtl">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0"> البريد</th>
                <th class="border-top-0">القوت</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loggers as $logger)
            <tr>
                <td>{{$logger->id}}</td>
                <td>{{$logger->name}}</td>
                <td>{{$logger->created_at}}</td>
 
            </tr>

            @endforeach
        </tbody>
    </table>
 </div>
@endsection
