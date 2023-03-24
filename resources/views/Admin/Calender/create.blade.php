@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Add New Calender </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.calender.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="img">Start</label>
        <input type="date" class="form-control" name="start"  placeholder="Start..">
    </div>
    <div class="form-group">
        <label for="role">Select Category</label>
        <select class="form-control" id="role" required name="category">
            <option value="PRIMARY">PRIMARY</option>
            <option value="KINDERGARTEN">KINDERGARTEN</option>
            <option value="MYP">MYP</option>
            <option value="IBDP">IBDP</option>
            <option value="CAS">CAS</option>
        </select>
      </div>
      <div class="form-group">
        <label for="role">Type</label> 
        <select class="form-control" id="role" required name="type">
            <option value="Assessment">Assessment</option>
            <option value="Holiday">Holiday</option>
            <option value="Event">Event</option>
            <option value="Meeting">Meeting</option>
            <option value="Trips">Trips</option>
        </select>
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
