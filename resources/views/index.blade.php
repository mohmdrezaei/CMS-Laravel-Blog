@extends("layouts.app")
@section("content")
    <main>
        <article class="container article">
            @if(isset($categoryName))
                <h3 class="margin-bottom-25">Posts in {{$categoryName}} category</h3>
            @endif
            <div class="articles " >
                @forelse($posts as $post)
                <div class="articles__item">
                    <a href="{{route('post.show',$post->slug)}}" class="articles__link">
                        <div class="articles__img">
                            <img src="{{$post->getBannerUrl()}}" class="articles__img-src">
                        </div>
                        <div class="articles__title">
                            <h2>{{$post->title}}</h2>
                        </div>
                        <div class="articles__details">
                            <div class="articles__author">Author : {{$post->user->name}}</div>
                            <div class="articles__date">Date : {{$post->created_at->format('Y-m-d')}}</div>
                        </div>
                    </a>
                </div>
                @empty
                    <div class="  empty-post "><p>No articles found!</p></div>
                @endforelse
            </div>

        </article>
        {{$posts->appends(request()->query())->links()}}
    </main>
@endsection
