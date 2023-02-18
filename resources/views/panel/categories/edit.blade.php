@extends('layouts.panel')
@section('title')
    - ویرایش دسته بندی
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('categories.index')}}" class="">دسته بندی ها</a></li>
            <li><a href="{{route('categories.edit',$category->id)}}" class="is-active">ویرایش دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش دسته بندی</p>
                <form action="{{route('categories.update',$category->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="text" name="name" placeholder="نام دسته بندی" value="{{$category->name}}">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select class="select" name="category_id" id="category_id">
                        <option value="">ندارد</option>
                        @foreach($parent_categories as $cat)
                            <option value="{{$cat->id}}" @if($cat->id === $category->category_id) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">ویرایش</button>
                </form>

            </div>
        </div>
    </div>
@endsection
