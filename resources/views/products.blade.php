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
                <input type="text" class="form-control" placeholder="بحــــــــــــــــــث">
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-control form-control-lg">
                <option>السعر بالجملة</option>
                <option>السعر قطاعي</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="categories">
          <h3 class="p-1">الفئات</h3>
          <ul>
            <li><a href="#">بودي</a></li>
            <li><a href="#">جناح</a></li>
            <li><a href="#">اضاءة</a></li>
            <li><a href="#">شاشات</a></li>
            <li><a href="#">بضاريات</a></li>
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
                <p> دينار<span style="float: right;color:rgb(98, 0, 255);font-weight:bold" id="price1">{{$product->price1}} </span></p>
                <p> دينار<span style="float: right;color:rgb(98, 0, 255);font-weight:bold" id="price2">{{$product->price2}} </span></p>
                <span class="fa fa-circle" id="red"></span>
                <span class="fa fa-circle" id="teal"></span>
                <span class="fa fa-circle" id="blue"></span>
              </div>
            </div> 
          @endforeach
         </div>

      </div>
    </div>
  </div>
</section>

@endsection