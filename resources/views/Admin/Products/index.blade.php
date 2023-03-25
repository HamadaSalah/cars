@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;margin-top: 0">كل المنتجات</h2>
<a href="{{route('admin.products.create')}}">  
    <button class="btn btn-primary" style="float: right"><i class="fa fa-plus"> </i>  منتج جديد</button>
</a>
<div class="clearfix"></div>
<div class="clear"></div>
    @if ($products->count() > 0)
    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable" style="direction: rtl">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">اسم المنتج</th>
                    <th class="border-top-0">رقم ال OEM</th>
                    <th class="border-top-0">العدد في المستودع</th>
                    <th class="border-top-0">العدد في نقطة البيع</th>
                    <th class="border-top-0">السعر جملة</th>
                    <th class="border-top-0">السعر مفرٌق</th>
                    <th class="border-top-0">المصدر</th>
                    <th class="border-top-0">اجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->loop+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->oem}}</td>
                    <td>{{$product->count1}}</td>
                    <td>{{$product->count2}}</td>
                    <td >دينار  {{$product->price1}}  </td>
                    <td> دينار {{$product->price2}}</td>
                    <td>{{$product->source}}</td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.products.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> حذف</button>
                        </form>
                        <a href="{{route('admin.products.edit', $product->id)}}"><button class="btn btn-success" type="submit"><i class="fa fa-trash"></i> تعديل</button></a>
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
        {{$products->links('pagination::bootstrap-4')}}
    </div>

    @else
        <div class="text-center">لا يوجد منتجات</div> 
    @endif
    <style>
        tr th:first-child{
            border-radius: 0 5px 0 0
        }
        tr th:last-child  {
            border-radius: 5px 0 0 0

        }
    </style>
@endsection
