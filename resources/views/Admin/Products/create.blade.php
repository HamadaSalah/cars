@extends('Admin.master')
@section('content')
<style>
  input, label, h2, option {
    float: right;
    text-align: right
  }
</style>
<h2 >اضافة منج جديد </h2>





<div class="clearfix"></div>
<form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label >اسم المنتج</label>
        <input type="text" class="form-control" name="name"  required>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >سعر الجملة</label>
      <input type="number" class="form-control" name="price1"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >سعر المفرق</label>
      <input type="number" class="form-control" name="price2"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label>العدد في المستودع</label>
      <input type="number" class="form-control" name="count1"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >العدد في نقطة البيع</label>
      <input type="number" class="form-control" name="count2"  required>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >OEM</label>
      <input type="text" class="form-control" name="oem"  required>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >(من)السنة</label>
      <input type="number" class="form-control" name="from_year"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >(الى)السنة</label>
      <input type="number" class="form-control" name="to_year"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label for="role">المصدر</label>
      <select class="form-control" required name="source">
          <option value="اصلي">اصلي</option>
          <option value="صيني">صيني</option>
          <option value="تايواني">تايواني</option>
          <option value="تركي">تركي</option>
          <option value="ياباني">ياباني</option>
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label for="role">السيارة</label> 
      <select class="form-control" required name="car_category_id"  id="select1" >
        <option value="">أختار سيارة</option>

        @foreach ($carCats as $carCat)
        <option value="{{$carCat->id}}">{{$carCat->name}}</option>
            
        @endforeach
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label for="role">موديل السيارة</label>
      <select class="form-control" required name="car_model_id" id="select2">
        <option value="" >أختار الموديل</option>

        {{-- @foreach ($carModels as $carmod)
        <option value="{{$carmod->id}}">{{$carmod->name}}</option>
            
        @endforeach --}}
      </select>
    </div>
    <div class="form-group">
      <label for="role">صنف السيارة</label>
      <select class="form-control"   name="car_model_model_id" id="select3">
      </select>
    </div>
    <div class="form-group">
      <label for="role">نوع القطعه</label>
      <select class="form-control" required name="category_id">
        @foreach ($cats as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>

     
    <button type="submit" class="btn btn-primary">اضافة</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@push('custom-scripts')
<script>
  $(document).ready(function() {
    $('#select1').on('change', function() {
    var id = $(this).val();
    // Make an AJAX r equest to fetch options for select2
    $.ajax({
      url: '{{route("getModels")}}',
      method: 'POST',
      data: {id: id},
      success: function(response) {
        // Clear the existing options in select2
        // $('#select2').empty();

        // Add new options based on the response
        $.each(response, function(index, option) {
          $('#select2').append('<option value="' + option.id + '">' + option.name + '</option>');
        });
      },
      error: function() {
        alert('Error occurred while fetching options for select2.');
      }
    });
  });
  $('#select2').on('change', function() {
    var id = $(this).val();
    // Make an AJAX r equest to fetch options for select2
    $.ajax({
      url: '{{route("getModelsModels")}}',
      method: 'POST',
      data: {id: id},
      success: function(response) {
        // Clear the existing options in select2
        $('#select3').empty();

        // Add new options based on the response
        $.each(response, function(index, option) {
          $('#select3').append('<option value="' + option.id + '">' + option.name + '</option>');
        });
      },
      error: function() {
        alert('Error occurred while fetching options for select3.');
      }
    });
  });
});

</script>
    
@endpush
@endsection
