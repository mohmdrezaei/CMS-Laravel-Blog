@extends('layouts.app')
@section('title')
    - Post {{$post->title}}
@endsection
@section('content')
    <main>
        <div class="container article">
            <article class="single-page">
                <div class="breadcrumb">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__item"><a href="{{route('index')}}" class="breadcrumb__link" title="خانه">بخش مقالات</a></li>
                        <li class="breadcrumb__item"><a href="{{route('post.show',$post->slug)}}" class="breadcrumb__link" title="فریم ورک لاراول چیست ؟‌">{{$post->title}}</a></li>
                    </ul>
                </div>
                <div class="single-page__title">
                    <h1 class="single-page__h1">{{$post->title}} </h1>
                    <span class="single-page__like"><i class="far fa-heart fa-2x c-red"></i></span>
                </div>
                <div class="single-page__details">
                    <div class="single-page__author">Author : {{$post->user->name}}</div>
                    <div class="single-page__date">Date : {{$post->created_at->format('Y-m-d')}}</div>
                </div>
                <div class="single-page__img">
                    <img class="single-page__img-src" src="{{$post->getBannerUrl()}}" alt="">
                </div>
                <div class="single-page__content" style="margin-bottom: 30px">
                        {!! $post->description !!}

                </div>
                <div class="single-page__tags">
                    <ul class="single-page__tags-ul">
                        @foreach($post->categories as $category)
                        <li class="single-page__tags-li"><a href="{{route('category.show',$category->slug)}}" class="single-page__tags-link">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </article>
        </div>
        <div class="container">
            <div class="comments" id="comments">
                @auth
                <div class="comments__send">
                    <div class="comments__title">
                        <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                        <span class="comments__count">  نظرات ( {{$post->comments_count}} ) </span>
                    </div>
                    <form action="{{route('comment.store')}}" method="post">
                        @csrf
                        <input type="hidden" id="reply_comment" name="comment_id" value="">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    <textarea class="comments__textarea" name="content" placeholder="بنویسید"></textarea>
                    <button  type="submit" class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                    <button type="reset" class="btn btn--red btn--shadow-red">انصراف</button>
                    </form>
                </div>
                @else
                    <h3 class="comments__h3">برای ارسال نظر ابتدا باید وارد سایت شوید</h3>
                @endauth
                <div class="comments__list">
                    @foreach($post->comments as $comment)
                    @include('comments.comment',['comment'=>$comment])
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
       function replyComment(id){
           document.getElementById('reply_comment').value =id
       }
    </script>
@endsection
