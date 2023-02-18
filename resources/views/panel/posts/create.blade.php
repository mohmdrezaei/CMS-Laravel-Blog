@extends('layouts.panel')
@section('title')
    - ایجاد مقاله جدید
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('posts.index')}}"> مقالات</a></li>
            <li><a href="{{route('posts.create')}}" class="is-active">ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="text" placeholder="عنوان مقاله">
                    @error('title')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <p>دسته بندی مقاله</p>
                    <ul class="tags">
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>
                    @error('categories')
                    <p class="alert-error">{{$message}}</p>
                    @enderror

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner" accept="image/*"/>
                        </div>

                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                        @error('banner')
                        <p class="alert-error">{{$message}}</p>
                        @enderror
                    </div>
                    <textarea placeholder="متن مقاله" name="description" class="text "></textarea>
                    @error('description')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('panel/js/tagsInput.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script >
        CKEDITOR.replace('description',{

        })
    </script>
@endsection
