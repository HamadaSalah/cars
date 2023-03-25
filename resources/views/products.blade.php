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
            <div class="col-md-8">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="{{$searchwords}}">
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control form-control-lg" id="my-select">
                <option value="g">السعر بالجملة</option>
                <option value="k">السعر مفرق</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="categories">
          <h3 class="p-1">الفئات</h3>
          <ul>
            @foreach ($cats as $cat)
                
            <li><a href="{{'SeaechSteps?'. Request::getQueryString()}}&model={{$cat->id}}">{{$cat->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-md-8">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-lg-3  card">
              <img class="card-img-top" src="img/product.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">{{$product->name}}</p>
                <p  class="price1"> دينار    <span style="float: right;color:rgb(98, 0, 255);font-weight:bold;padding: 0 3px">{{$product->price1}} </span></p>
                <p class="price2" style="display: none" > دينار <span style="float: right;color:rgb(98, 0, 255);font-weight:bold;padding: 0 3px" >{{$product->price2}} </span></p>
                <span class="fa fa-circle" id="red"></span>
                <span class="fa fa-circle" id="teal"></span>
                <span class="fa fa-circle" id="blue"></span>
                <form action="{{route('addToCart', $product->id)}}" method="POST">
                  @csrf
                  <button class="btn btn-primary addingcart" type="submit">  اضافة للسلة</button></td>
                </form>
  
              </div>
            </div> 
          @endforeach
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