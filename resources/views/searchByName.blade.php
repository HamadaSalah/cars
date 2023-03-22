@extends('master')
@section('section')
<div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
         
    </div>
  </div>
  <section class="selectcaa"> 
    <div class="container ">
      <table class="table" dir="rtl">
        <thead class=" " style="background-color: #2948ab;color: #fff;">
          <tr>
            <th scope="col">اسم القطعة</th>
            <th scope="col">المصدر</th>
            <th scope="col">الكمية في المستودع</th>
            <th scope="col">الكمية في نقطة البيع</th>
            <th scope="col">  سعر البيع جملة</th>
            <th scope="col">سعر البيع قطاعي</th>
            <th scope="col">السلة</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->source}}</td>
              <td>{{$item->count1}}</td>
              <td>{{$item->count2}}</td>
              <td>{{$item->price1}} دينار</td>
              <td>{{$item->price2}}</td>
              <td>
                <form action="{{route('addToCart', $item->id)}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit"> اضف الي السلة</button></td>
              </form>
                {{-- <a href="{{route('addToCart', $item->id)}}"></a> --}}
            </tr>                
            @endforeach
         </tbody>
      </table>
      
    </div>
  </section>


@endsection