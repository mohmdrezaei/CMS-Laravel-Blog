@extends('layouts.panel')
@section('title')
    - مدیریت کاربران
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="is-active">کاربران</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('users.index')}}">همه کاربران</a>
                <a class="tab__item" href="{{route('users.create')}}">ایجاد کاربر جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>تلفن همراه</th>
                    <th>سطح کاربری</th>
                    <th>تاریخ عضویت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr role="row" class="">
                        <td><a href="">{{$user->id}}</a></td>
                        <td><a href="">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->getRoleInfarsi()}}</td>
                        <td>{{$user->getCreatedAtJalali()}}</td>
                        <td>
                            @if(auth()->user()->id !== $user->id && $user->role !== "admin")
                                <a href="{{route('users.destroy',$user->id)}}" class="item-delete mlg-15" title="حذف"
                                   onclick="destroyUser(event,{{$user->id}})"><i class="fas fa-trash-alt fa-lg"></i></a>
                            @endif
                            <a href="{{route('users.edit',$user->id)}}" class="item-edit " title="ویرایش"><i class="fas fa-edit fa-lg"></i></a>
                            <form action="{{route('users.destroy',$user->id)}}" method="post"
                                  id="delete-user-{{$user->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="text-center">
            {{$users->links()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        function destroyUser(event, id) {
            event.preventDefault();
            Swal.fire({
                title: 'آیا مطمئن به حذف کاربر هستید ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله. حذف کن!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-user-${id}`).submit()
                }
            })
        }

    </script>
@endsection
