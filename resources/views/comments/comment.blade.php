<div id="comment-{{$comment->id}}">
    <div class="comments__box">
        <div class="comments__inner">
            <div class="comments__header">
                <div class="comments__row">
                    <div class="d-flex flex-grow-1">
                        <div class="comments__avatar">
                            <img src="{{$comment->user->getProfileUrl()}}" class="comments__img" height="50" style="border-radius: 50%">
                        </div>
                        <div class="comments__details">
                            <h5 class="comments__author"><span class="comments__author-name">{{$comment->user->name}}</span></h5>
                            <span class="comments_date"> {{$comment->created_at->diffForHumans()}} </span>
                        </div>
                    </div>
                    <a href="#comments" onclick="replyComment({{$comment->id}})" class="btn btn--blue btn--shadow-blue btn--comments-reply">Send reply</a>
                </div>
            </div>
            <p class="comments__body">
                {{$comment->content}}
            </p>
        </div>
        <div class="comments__subset">
            @foreach($comment->approvedReplies as $reply)
                @include('comments.comment',['comment'=>$reply])
            @endforeach
        </div>
    </div>
</div>
