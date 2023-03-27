@extends('layouts.panel')
@section('title')
    - Create a New Article
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route('posts.index')}}"> articles</a></li>
            <li><a href="{{route('posts.create')}}" class="is-active">create a new article</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">Create a New Article</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="text" placeholder="Title">
                    @error('title')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <p>Category</p>
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
                            <span>Upload banner</span>
                            <input type="file" class="file-upload" id="files" name="banner" accept="image/*"/>
                        </div>

                        <span class="filesize"></span>
                        <span class="selectedFiles">No file has been selected</span>
                        @error('banner')
                        <p class="alert-error">{{$message}}</p>
                        @enderror
                    </div>
                    <textarea placeholder="Description" name="description" class="text "></textarea>
                    @error('description')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net ">Create</button>
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
