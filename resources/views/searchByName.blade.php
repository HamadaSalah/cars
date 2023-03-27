@extends('master')
@section('section')
<div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
         
    </div>
  </div>
  <section class="selectcaa"> 
    <div class="container ">
      <form action="{{route('serachByName')}}" method="get">
            <legend class="scheduler-border">اسم القطعة</legend>
            <div class="control-group">
                <div class="controls ">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="اسم القطعة" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      
                    <i class="icon-time"></i>
                </div>
            </div>
        <button class="btn btn-success sebtn" type="submit">بحث</button>
      </form>

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
              <td>{{$item->count1}}</td>
              <td>{{$item->count2}}</td>
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