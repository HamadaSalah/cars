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
            <th scope="col">اسم الفاتورة</th>
            <th scope="col">رقم الفاتورة</th>
            <th scope="col">التفاصيل</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($faws as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->number}}</td>
               <td>
                <a href="{{route('convertToShowGet', $item->id)}}"><button class="btn btn-primary">التفاصيل</button></a>
            </td>
             </tr>                
            @endforeach
         </tbody>
      </table>
      
    </div>
  </section>


@endsection