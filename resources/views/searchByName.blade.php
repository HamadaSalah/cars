@extends('master')
@section('section')
<div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
         
    </div>
  </div>
  <section class="selectcaa"> 
    <div class="container ">
      <form action="{{route('serachByName')}}" method="get">
      <div class="row">
          <div class="col-md-3">
            <legend class="scheduler-border">اسم القطعة</legend>
            <div class="control-group">
                <div class="controls ">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="اسم القطعة" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      
                    <i class="icon-time"></i>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlSelect1">اختر السيارة</label>
              <select class="form-control" name="carcat" id="select1">
                <option value="">اختار السيارة</option>
                @foreach ($cars as $car)
                <option value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
              </select>
            </div>
          
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlSelect1">اختر الموديل</label>
              <select class="form-control" id="select2" name="carmodel">
                <option value="">اختار الموديل</option>
              </select>
            </div>
          
          </div>
          <div class="col-md-3">
            <button class="btn btn-success  " style="margin-top: 30px;width: 100%" type="submit">بحث</button>

          </div>
        </form>

      </div>

      <table class="table" dir="rtl">
        <thead class=" " style="background-color: #2948ab;color: #fff;">
          <tr>
            <th scope="col">اسم القطعة</th>
            <th scope="col">السيارة</th>
            <th scope="col">الموديل</th>
            <th scope="col">المصدر</th>
            <th scope="col">الكمية في المستودع</th>
            <th scope="col">الكمية في نقطة البيع</th>
            <th scope="col">  سعر البيع جملة</th>
            <th scope="col">سعر البيع مفرق</th>
            <th scope="col">السلة</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->carCategory->name}}</td>
              <td>{{$item->carModel->name}}</td>
              <td>{{$item->source}}</td>
              <td class="<?php if($item->count1 <= 10) echo 'RED'; ?>" >{{$item->count1}}</td>
              <td class="<?php if($item->count1 <= 10) echo 'RED'; ?>" >{{$item->count2}}</td>
              <td>{{$item->price1}} دينار</td>
              <td>{{$item->price2}} دينار</td>
              <td>
                {{-- <form action="{{route('addToCart', $item->id)}}" method="POST">
                @csrf --}}
                <button class="btn btn-primary addingcart" data-id="{{ $item->id }}" type="submit">  اضافة للسلة</button></td>
              {{-- </form> --}}
                {{-- <a href="{{route('addToCart', $item->id)}}"></a> --}}
            </tr>                
            @endforeach
         </tbody>
      </table>
      {{$items->links('pagination::bootstrap-4')}}
    </div>
  </section>
@push('scripts')
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
      });
    $('.addingcart').on('click', function() {
      var carId = $(this).data('id');
      $.ajax({
        url: '{{route("ApiAddToCart")}}',
        type: 'POST',
        data: { id: carId  },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
          console.log('AJAX request sent successfully');
        },
        error: function(error) {
          console.log('Error sending AJAX request: ' + error);
        }
      });

  });
  
  </script>    
@endpush
@endsection