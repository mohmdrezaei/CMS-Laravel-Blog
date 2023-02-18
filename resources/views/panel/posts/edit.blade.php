@extends('layouts.panel')
@section('title')
    - ویرایش مقاله
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('posts.index')}}"> مقالات</a></li>
            <li><a href="{{route('posts.edit',$post->slug)}}"  class="is-active" >ویرایش مقاله</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title"> ویرایش مقاله ({{$post->title}})</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.update',$post->slug)}}" class="padding-30" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="text" name="title" placeholder="عنوان مقاله" value="{{$post->title}}">
                    @error('title')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <p>دسته بندی مقاله</p>
                    <ul class="tags">
                        @foreach($post->categories as $category)
                        <li class="addedTag">{{$category->name}}<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="{{$category->name}}" name="categories[]">
                        </li>
                        @endforeach
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field" >
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
                    <textarea placeholder="متن مقاله" class="text " name="description">{!! $post->description !!}</textarea>
                    @error('description')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">ویرایش مقاله</button>
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
            filebrowserUploadUrl: '{{ route("editor-upload", ["_token" =>csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
        })
        window.parent.CKEDITOR.tools.callFunction()
    </script>
@endsection
