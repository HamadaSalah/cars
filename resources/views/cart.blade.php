@extends('master')
@section('section')
<div class="clearfix"></div>
<div class="header" style="height: 400px!important;min-height: unset;">
  <div class="overlayy" style="height: 400px!important;min-height: unset;">
     
  </div>
</div>


 

  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <section>
    <div class="container cartpage">
      <div class="row">

        <div class="shopping-cart">

          <div class="column-labels">
            <label class="product-image">الصورة</label>
            <label class="product-details">اسم المنتج</label>
            <label class="product-price">السعر</label>
            <label class="product-quantity">الكمية</label>
            <label class="product-line-price">السعر الكلي</label>
            <label class="product-removal">حذف</label>
          </div>
          @foreach ($carts as $cart)
            <div class="product">
              <div class="product-image">
                <img src="{{asset('img/product.png')}}">
              </div>
              <div class="product-details">
                <div class="product-title">{{$cart->item->name}}</div>
              </div>
              <div class="product-price">{{$cart->item->price1}} دينار</div>
              <div class="product-quantity">
                <input type="number" class="UpdateCount" value="{{$cart->count}}" min="1" data-id="{{$cart->id}}" >
              </div>
              <div class="product-line-price">{{$cart->item->price1*$cart->count}} دينار</div>
              <div class="product-removal">
                <button class="remove-product btn btn-danger DeleteCart" data-id="{{$cart->id}}">
                  حذف
                </button>
              </div>
            </div>
              
          @endforeach
 
 
          <div class="totals">
            <div class="totals-item">
              <label>الاجمالي</label>
              <div class="totals-value" id="cart-subtotal">{{$total}} دينار</div>
            </div>
            <div class="totals-item">
              <label>الضريبة (19%)</label>
              <div class="totals-value" id="cart-tax">{{intval($total/100*19)}} دينار</div>
            </div>
            {{-- <div class="totals-item">
              <label>الشحن</label>
              <div class="totals-value" id="cart-shipping">15.00</div>
            </div> --}}
            <div class="totals-item totals-item-total">
              <label>التوتال</label>
              <div class="totals-value" id="cart-total">{{intval($total+$total/100*19)}} دينار</div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12" style="text-align: center;">
            <a href="{{route('convertToShow')}}"><button class="checkout " style="text-align: center;margin: auto;float: none;margin: 30px;">عرض سعر الان</button></a>

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

<script>

  $(document).ready(function() {
    $(".DeleteCart").click(function(e){
      e.preventDefault();

      var id = $(this).attr("data-id");

      $.ajax({
        url: `/api/del-cart/${id}`,
        type:"get",
        data:{
        },
        success:function(resp){}, 
        error: function(){
          // alert("Error");
        }
       });
  });
  $(".UpdateCount").change(function(e){
      e.preventDefault();

      var id = $(this).attr("data-id");

      $.ajax({
        url: `/api/inc-cart/${id}`,
        type:"POST",
        data:{
          count : $(this).val()
        },
        success:function(resp){}, 
        error: function(){
          // alert("Error");
        }
       });
  });
  });

  
</script>

</script>
@endsection