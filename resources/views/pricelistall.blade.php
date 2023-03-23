@extends('master')
@section('section')
<div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
         
    </div>
  </div>
  <section class="selectcaa"> 
    <div class="container ">
      <form action="{{route('pricelist')}}" method="GET" style="width: 100%">
        <div class="form-group">
          <label for="search">البحث</label>
          <input type="text" name="search" class="form-control" id="search"  placeholder="بحث بالاسم">
        </div>
      
      </form>

      <table class="table" dir="rtl">
        <thead class=" " style="background-color: #2948ab;color: #fff;">
          <tr>
            <th scope="col">اسم عارض السعر</th>
            <th scope="col">رقم العر ض</th>
            <th scope="col">التاريخ</th>
            <th scope="col">التفاصيل</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($faws as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->number}}</td>
              <td>{{$item->created_at}}</td>
               <td>
                <a href="{{route('pricelistget', $item->id)}}"><button class="btn btn-primary">التفاصيل</button></a>
            </td>
             </tr>                
            @endforeach
         </tbody>
      </table>
      
    </div>
  </section>


@endsection