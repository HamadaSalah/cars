@extends('Admin.master')
@section('content')
<a href="{{route('admin.users.create')}}">
    <button class="btn btn-primary mb-4">اضافة مستخدم جديد</button>
</a>
<div class="table-responsive">
    <table class="table user-table no-wrap">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0"> الاسم</th>
                <th class="border-top-0">البريد</th>
                <th class="border-top-0">اجراء</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">مسح</button>

                    </form>
                    <a href="{{Route('admin.users.edit', $user->id)}}">
                        <button class="btn btn-success">تعديل</button>
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
 </div>
@endsection
