@extends('master')
@section('section')
 <div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
        @if ($show->type == 'fatora')
        <h1 style="text-align: center;color: #FFF;">عــــرض القاتورة</h1>
        @else
        <h1 style="text-align: center;color: #FFF;">عــــرض ســــعــــر</h1>
        @endif
    </div>
  </div>


  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <table class="table dealertable">
        <thead>
          <tr>
            <th scope="col">اسم العميل</th>
            <th scope="col">{{$show->name}}</th>
          </tr>
          <tr>
            <th scope="col">التاريخ</th>
            <th scope="col">{{$show->created_at}}</th>
          </tr>
          <tr>
            <th scope="col">رقم الفاتورة</th>
            <th scope="col">{{$show->number}}</th>
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
              <th scope="col">سعر القطعة الواحدة</th>
              <th scope="col">الكمية</th>
              <th scope="col">المبلغ</th>
            </tr>
          </thead>
          <tbody>
            {{-- @dd($show->products) --}}
            <?php $total = 0;?>
            @foreach ($show->products as $pro)
                <?php
                 $total += $pro->item->price1*$pro->count;
                 ?>
                <tr>
                    <td>{{$pro->item->name}}</td>
                    <td>{{$pro->item->price1}} دينار</td>
                    <td>{{$pro->count}}</td>
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
          @if ($show->type == 'fatora')
          @else
          <a href="{{Route('convertToFatorah', $show->id)}}"><button class="fatoranow" >تحويل الي فاتورة الان</button></a>
          @endif
          @if ($show->type == 'fatora')
          <span>المدفوع : {{$show->pay}} دينار</span>
          <span>المتبقي : {{$show->rest}} دينار</span>
          <br/>
          <br/>
          @endif
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
        <form action="{{Route('editfatorah', $show->id)}}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$show->name}}">
            </div>
            <div class="form-group">
                <label for="name">تم دفع</label>
                <input type="text" class="form-control" id="name" name="pay" value="{{$show->pay}}">
            </div>
            <div class="form-group">
                <label for="name">الباقي</label>
                <input type="text" class="form-control" id="name" name="rest" value="{{$show->rest}}">
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

<style>  .overlayy, .header{
    height: 50px!important;
    min-height: 50px!important;
  }
</style>
 @endsection