@extends('layouts.panel')
@section('title')
    - Articles Management
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route('posts.index')}}" class="is-active"> articles</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('posts.index')}}">Articles</a>
                <a class="tab__item " href="{{route('posts.create')}}">Create a New Article</a>
            </div>
        </div>
        <div class="bg-white padding-20">

                <form action="{{route('posts.index')}}" >
                    <div class=" font-size-13">
                                <input type="text" name="search" class="text" placeholder="Article name" value="{{request('search')}}">
                                <button type="submit" class="btn btn-webamooz_net">Search</button>
                    </div>
                </form>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th> creation date</th>
                    <th>operation</th>
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
                            <a href="{{route('posts.destroy',$post->slug)}}" class="item-delete mlg-15" title="Delete" onclick="destroyPost(event,{{$post->id}})"><i class="fas fa-trash-alt fa-lg"></i></a>
                            <a href="{{route('posts.edit',$post->slug)}}" class="item-edit " title="Edit"><i class="fas fa-edit fa-lg"></i></a>
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
                title: 'Are you sure to delete the article?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes.Delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-post-${id}`).submit()
                }
            })
        }
    </script>
@endsection
