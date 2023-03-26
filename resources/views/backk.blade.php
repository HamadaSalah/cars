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
             <h1 class="text-center mt-5 mb-3">الاسترجاع برقم الفاتورة</h1>
            <form action="{{route('backagain')}}" method="GET" style="margin-bottom: 50px">
                <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" >
              </form>
              <div class="clearfix"></div>
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
