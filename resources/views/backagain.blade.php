@extends('master')
@section('section')
 <div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
        <h1 style="text-align: center;color: #FFF;">استرجاع من فاتورة</h1>
    </div>
  </div>


  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <table class="table dealertable">
        <thead>
          <tr>
            <th scope="col">اسم العميل</th>
            <th scope="col">{{$fatorah->name}}</th>
          </tr>
          <tr>
            <th scope="col">التاريخ</th>
            <th scope="col">{{$fatorah->created_at}}</th>
          </tr>
          <tr>
            <th scope="col">رقم الفاتورة</th>
            <th scope="col">{{$fatorah->number}}</th>
          </tr>
        </thead>
       
      </table>
    </div>
  </div>
  
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <section>
    <div class="container">
      <div class="row">
        <table class="table" dir="rtl">
          <thead class=" " style="background-color: #2948ab;color: #fff;">
            <tr>
              <th scope="col">اسم القطعة</th>
              <th scope="col">الكمية</th>
              <th scope="col">عدد المسترجع</th>
              <th scope="col">المبلغ</th>
            </tr>
          </thead>
          <tbody>
            {{-- @dd($show->products) --}}
            <?php $total = 0;?>
            @foreach ($fatorah->products as $pro)
                <?php
                 $total += $pro->item->price1*$pro->count;
                 ?>
                <tr>
                    <td>{{$pro->item->name}}</td>
                    <td><input disabled type="number" value="{{$pro->count}}" name="MyCount" class="MyCount" /></td>
                    <td>
                        <button   class="btn btn-danger max-number-input" min="0" value="{{$pro->count}}" maxlength="{{$pro->count}}" data-count="{{$pro->count}}" data-primary="{{$pro->id}}" data-item="{{$pro->item_id}}" data-fat="{{$fatorah->id}}">أنقص</button>
 
                        {{-- <input type="number" class="myInput" max="{{$pro->count}}"  pattern="\d*" name="reduce[]" 
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > --}}
                    </td>
                    <td>{{$pro->item->price1*$pro->count}} دينار</td>
                </tr>    
            @endforeach
           </tbody>
        </table>
        <div class="col-md-12">
          <div class="filters" style="display: block;width: 100%;min-height: 80px;">
            <h3  style="color: #FFF;float: right;">المجموع</h3>
            <h3 style="color: #fff;float: left;">{{$total}} دينار</h3>
            {{-- <div class="clearfix"></div>
            <h3  style="color: #FFF;float: right;direction: rtl;"> الضريبة <span>(19%) </span>  </h3>
            <h3 style="color: #fff;float: left;">{{intval($total*19/100)}} دينار</h3>
            <div class="clearfix"></div>
            <h3  style="color: #FFF;float: right;">المجموع</h3>
            <h3 style="color: #fff;float: left;">{{$total+intval($total*19/100)}} دينار</h3> --}}
            <div class="clearfix"></div>
          </div>
          <span>المدفوع : {{$fatorah->pay}} دينار</span>
          <span>المتبقي : {{$fatorah->rest}} دينار</span>
          <br/>
          <br/>
          <div class="sign">
            <p>التوقيع</p>
            <img src="{{asset('img/sign.jpg')}}" style="margin-bottom: 20px" alt="">
          </div>

          <a href="#"><button class="fatoranow"  data-toggle="modal" data-target="#exampleModal">تعديل البيانات</button></a>
          <a  ><button class="fatoranow" onclick="window.print();">طباعة</button></a>


        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الفاتورة والزمم</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{Route('editfatorah', $fatorah->id)}}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$fatorah->name}}">
            </div>
            <div class="form-group">
                <label for="name">تم دفع</label>
                <input type="text" class="form-control" id="name" name="pay" value="{{$fatorah->pay}}">
            </div>
            <div class="form-group">
                <label for="name">الباقي</label>
                <input type="text" class="form-control" id="name" name="rest" value="{{$fatorah->rest}}">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </section>
  <script>
        $('.max-number-input').on('click', function() {
           if($(this).parent().parent().find(".MyCount").val() > 0) {
             var fid = $(this).data('fat'); 
             var count = $( this ).val();
             var item = $(this).data('item');
             var id = $(this).data('primary');
             count = count-1;
             $( this ).val(count);
             $(this).parent().parent().find(".MyCount").val(count);
             $.ajax({
               url: '{{route("changeitemCount")}}',
               type: 'POST',
               data: { id: id, count: count, fid: fid, item : item },
               success: function(response) {
                 alert("تم الانقاص")
               },
               error: function(error) {
                 console.log('Error sending AJAX request: ' + error);
               }
             });
           }
           else {
            alert("لا يمكن الانقاص")

           }
    });

    // Add click event listeners to the increase and decrease buttons
    // $('.increase-button').on('click', function() {
    //   var currentValue = parseInt($('#max-number-input').val());
    //   $('.max-number-input').val(currentValue + 1);
    //   sendAjaxRequest();
    // });
    
    // $('.decrease-button').on('click', function() {
    //   var currentValue = parseInt($('.max-number-input').val());
    //   if (currentValue > 1) {
    //     $('.max-number-input').val(currentValue - 1);
    //     sendAjaxRequest();
    //   }
    // });
    
    // Send an AJAX request when the input value is changed
    
    // Function to send the AJAX request
     </script>
    
<style>  .overlayy, .header{
    height: 50px!important;
    min-height: 50px!important;
  }
</style>
@push('custom-scripts')
<script>

</script>
@endpush
@endsection