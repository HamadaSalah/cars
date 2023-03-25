@extends('master')
@section('section')
<div class="clearfix"></div>
<div class="header" style="height: 400px!important;min-height: unset;">
  <div class="overlayy" style="height: 400px!important;min-height: unset;">
     
  </div>
</div>

<section>
  <div class="container" id="PROducts">
    <div class="row">
     
      <div class="col-md-12 filters">
        <div class="">
        <div class="row">
            <div class="col-md-12">
              <form action="{{route('gard')}}" method="get">
                    <div class="control-group">
                        <div class="controls ">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="اسم القطعة" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              
                            <i class="icon-time"></i>
                        </div>
                    </div>
              </form>
                    </div>
            {{-- <div class="col-md-4">
              <select class="form-control form-control-lg" id="my-select">
                <option value="g">السعر بالجملة</option>
                <option value="k">السعر مفرق</option>
              </select>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="categories">
          <h3 class="p-1">الفئات</h3>
          <ul>
            @foreach ($cats as $cat)
                
            <li><a href="{{'gard?'. Request::getQueryString()}}&model={{$cat->id}}">{{$cat->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-md-8">
        <div class="row">
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
               </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->carCategory->name}}</td>
                  <td>{{$item->carModel->name}}</td>
    
                  <td>{{$item->source}}</td>
                  <td>{{$item->count1}}</td>
                  <td>{{$item->count2}}</td>
                  <td>{{$item->price1}} دينار</td>
                  <td>{{$item->price2}} دينار</td>
                 </tr>                
                @endforeach
             </tbody>
            
          </table>         
          {{$products->links('pagination::bootstrap-4')}}
        </div>

      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
  $('#my-select').on('change', function() {
    var selectedValue = $(this).val();
    console.log(selectedValue);
    if (selectedValue == 'g') {
      $('.price1').css("display", "block");
      $('.price2').css("display", "none");
    } else {
      $('.price2').css("display", "block");
      $('.price1').css("display", "none");
  }
});
});
</script>
@endsection