@extends('layouts.panel')
@section('title')
    - Comments Management
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route('comments.index')}}" class="is-active"> comments</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('comments.index')}}"> All Comments</a>
                <a class="tab__item " href="{{route('comments.index',['status'=>0])}}">UnApproved comments</a>
                <a class="tab__item " href="{{route('comments.index',['status'=>1])}}">Approved comments</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>Id</th>
                    <th>Sender</th>
                    <th>For</th>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Number of replies</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr role="row">
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td> {{$comment->post->title}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->format('Y-m-d')}}</td>
                        <td>{{$comment->replies_count}}</td>
                        <td class="{{$comment->status ? 'text-success' : 'text-error'}}">{{$comment->getStatus()}}</td>
                        <td>
                            <a href="{{route('comments.destroy',$comment->id)}}"
                               onclick="deleteComment(event,{{$comment->id}})" class="item-delete mlg-15" title="حذف"><i
                                    class="fas fa-trash-alt fa-lg"></i></a>

                            <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"><i
                                    class="fas fa-eye fa-lg"></i></a>
                            @if($comment->status)
                            <a href="{{route('comments.update',$comment->id)}}"
                               onclick="updateComment(event,{{$comment->id}})" class="item-reject mlg-15" title="رد"><i
                                    class="fas fa-times fa-lg"></i></a>
                            @else
                            <a href="{{route('comments.update',$comment->id)}}"
                               onclick="updateComment(event,{{$comment->id}})" class="item-confirm mlg-15" title="تایید"><i
                                    class="fas fa-check fa-lg"></i></a>
                            @endif
                            <form action="{{route('comments.update',$comment->id)}}" method="post"
                                  id="update-comment-{{$comment->id}}">
                                @csrf
                                @method('PATCH')
                            </form>
                            <form action="{{route('comments.destroy',$comment->id)}}" method="post"
                                  id="destroy-comment-{{$comment->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{$comments->appends(request()->query())->links()}}
    </div>
@endsection
@section('script')
    <script>
        function updateComment(event,id)
        {
            event.preventDefault();
            document.getElementById(`update-comment-${id}`).submit()
        }
        function deleteComment(event,id)
        {
            event.preventDefault();
            Swal.fire({
                title: 'آیا مطمئن به حذف نظر هستید ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله. حذف کن!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`destroy-comment-${id}`).submit()
                }
            })
        }
    </script>
@endsection
