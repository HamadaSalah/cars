@extends('master')
@section('section')
<div class="header" style="height: 400px!important;min-height: unset;">
    <div class="overlayy" style="height: 400px!important;min-height: unset;">
        <h1 style="text-align: center;color: #FFF;">الذمم</h1>
    </div>
</div>


<div class="clearfix"></div>

 <section>
    <div class="container">
        <div class="row">
             <h1 class="text-center mt-5 mb-3">البحث عن الذمم بالاسم</h1>
            <form action="{{route('zemam')}}" method="GET" style="margin-bottom: 50px">
                <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" >
              </form>
              <div class="clearfix"></div>
            @if (count($zemam) > 0)
            <table class="table" dir="rtl">
                <thead class=" " style="background-color: #2948ab;color: #fff;">
                    <tr>
                        <th scope="col">رقم الفاتورة</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col">تم دفع</th>
                        <th scope="col">الباقي </th>
                        <th scope="col">عرض الفاتورة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalpay = 0;?>
                    <?php $totalrest = 0;?>
                    @foreach($zemam as $zema)
                        <?php $totalpay += $zema->pay; ?>
                        <?php $totalrest += $zema->rest; ?>
                        <tr>
                            <td>{{ $zema->number }}</td>
                            <td>{{ $zema->created_at }} </td>
                            <td>{{ $zema->pay }} دينار</td>
                            <td>{{ $zema->rest }} دينار</td>
                            <td><a href="{{Route('convertToShowGet', $zema->id)}}"><button class="btn btn-success">عرض</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                <a><button class="fatoranow" onclick="window.print();">طباعة</button></a>
                <h4>المدفوع : {{ $totalpay }} دينار</h4> 
                <h4>المتبقي : {{ $totalrest }} دينار</h4>
                <br />
                <br />

                {{-- <a href="#"><button class="fatoranow"  data-toggle="modal" data-target="#exampleModal">تعديل البيانات</button></a> --}}


            </div>

            @else
            {{-- <h1 class="text-center">لا يوجد ذمم</h1> --}}
            @endif
        </div>
    </div>
    <!-- Modal -->
   
</section>

<style>
    .overlayy,
    .header {
        height: 50px !important;
        min-height: 50px !important;
    }

</style>
@endsection
