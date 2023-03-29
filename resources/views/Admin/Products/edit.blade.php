@extends('Admin.master')
@section('content')
<style>
  input, label, h2, option {
    float: right;
    text-align: right
  }
</style>
<h2 >تعديل المنتج </h2>
<div class="clearfix"></div>
<form method="POST" action="{{route('admin.products.update', $item->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label >اسم المنتج</label>
        <input type="text" class="form-control" name="name"  required value="{{$item->name}}">
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >سعر الجملة</label>
      <input type="number" class="form-control" name="price1"  required value="{{$item->price1}}">
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >سعر المفرق</label>
      <input type="number" class="form-control" name="price2"  required value="{{$item->price2}}">
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label>العدد في المستودع</label>
      <input type="number" class="form-control" name="count1"  required value="{{$item->count1}}">
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >العدد في نقطة البيع</label>
      <input type="number" class="form-control" name="count2"  required value="{{$item->count2}}">
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >OEM</label>
      <input type="text" class="form-control" name="oem"  required value="{{$item->oem}}">
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label >(من)السنة</label>
      <input type="number" class="form-control" name="from_year" value="{{$item->from_year}}"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label >(الى)السنة</label>
      <input type="number" class="form-control" name="to_year" value="{{$item->to_year}}"  required>
    </div>
    <div class="clearfix"></div>
    <br/>

    <div class="form-group">
      <label for="role">المصدر</label>
      <select class="form-control" id="role" required name="source">
          <option value="اصلي" <?php if($item->source == 'اصلي') { echo ' selected="selected"'; } ?>  >اصلي</option>
          <option value="صيني" <?php if($item->source == 'صيني') { echo ' selected="selected"'; } ?> >صيني</option>
          <option value="تايواني" <?php if($item->source == 'تايواني') { echo ' selected="selected"'; } ?> >تايواني</option>
          <option value="تركي" <?php if($item->source == 'تركي') { echo ' selected="selected"'; } ?> >تركي</option>
          <option value="ياباني" <?php if($item->source == 'ياباني') { echo ' selected="selected"'; } ?> >ياباني</option>
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label for="role">السيارة</label>
      <select class="form-control" id="select1" required name="car_category_id">
        @foreach ($carCats as $carCat)
        <option value="{{$carCat->id}}"  <?php if($carCat->id == $item->car_category_id) { echo ' selected="selected"'; } ?> >{{$carCat->name}}</option>
            
        @endforeach
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
      <label for="role">موديل السيارة</label>
      <select class="form-control" id="select2" required name="car_model_id">
        @foreach ($carModels as $carmod)
        <option value="{{$carmod->id}}"  <?php if($carmod->id == $item->car_model_id) { echo ' selected="selected"'; } ?> >{{$carmod->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="role">صنف السيارة</label>
      <select  class="form-control" name="car_model_model_id" id="select3">
        @foreach ($carModelss as $carmods)
        <option value="{{$carmods->id}}"  <?php if($carmods->id == $item->car_model_id) { echo ' selected="selected"'; } ?> >{{$carmods->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="role">نوع القطعه</label>
      <select class="form-control" id="role" name="category_id">
        @foreach ($cats as $cat)
          <option value="{{$cat->id}}"  <?php if($cat->id == $item->category_id) { echo ' selected="selected"'; } ?> >{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="clearfix"></div>
    <br/>

     
    <button type="submit" class="btn btn-primary">تعديل</button>
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
        $('#select2').empty();

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
