@extends('layouts.panel')
@section('title')
    - مدیریت مقالات
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('posts.index')}}" class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('posts.index')}}">لیست مقالات</a>
                <a class="tab__item " href="{{route('posts.create')}}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="{{route('posts.index')}}" >
                    <div class="t-header-searchbox font-size-13">
                        <div  class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" name="search" class="text" placeholder="نام مقاله">
                                <button type="submit" class="btn btn-webamooz_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>نویسنده</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr role="row" class="">
                        <td><a href="">{{$post->id}}</a></td>
                        <td><a href="">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a href="{{route('posts.destroy',$post->slug)}}" class="item-delete mlg-15" title="حذف" onclick="destroyPost(event,{{$post->id}})"><i class="fas fa-trash-alt fa-lg"></i></a>
                            <a href="{{route('posts.edit',$post->slug)}}" class="item-edit " title="ویرایش"><i class="fas fa-edit fa-lg"></i></a>
                            <form action="{{route('posts.destroy',$post->slug)}}" method="POST" id="delete-post-{{$post->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        {{$posts->appends(request()->query())->links()}}
    </div>
@endsection
@section('script')
    <script>
       function destroyPost(event,id)
        {
            event.preventDefault();
            Swal.fire({
                title: 'آیا مطمئن به حذف مقاله هستید ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله. حذف کن!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-post-${id}`).submit()
                }
            })
        }
    </script>
@endsection
