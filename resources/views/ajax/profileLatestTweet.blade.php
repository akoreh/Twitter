
<div class="tweet-wrapper w-clearfix" data-tweet-id="{{$tweet->id}}" >
    <div class="tweet-left-side-wrapper"><a href="{{route('show.profile',$tweet->user->profile->url_handle)}}"><img class="tweet-avatar" height="48" src="/images/profiles/{{$tweet->user->profile->image->file}}" width="48"></a>
    </div>
    <div class="tweet-right-side-wrapper w-clearfix">
        <a class="tweet-username" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->display_name}}</a>
        <a class="tweet-handle" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->handle}}</a><span> · </span>
        <a class="tweet-date" href="#">{{$tweet->created_at->diffForHumans()}}</a>

        @if($embed=$tweet->getEmbed())
            <p class="tweet-text">{{$tweet->clean()}}
                @foreach($tweet->getDisplayHashtags() as $hashtag)

                    <a href="" style="color:black;">{{$hashtag}}</a>

                @endforeach
            </p>
            <blockquote class="embedly-card" data-card-controls="0"><h4><a href="{{$embed->url}}">{{$embed->title}}</a></h4><p>{{$embed->description}}</p></blockquote>
            <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
            <div class="tweet-button-wrapper w-clearfix"><a class="tweet-bottom-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">20</span></span></a><a class="retweet-button tweet-bottom-button w-button" href="#"><span class="reply-icon">&nbsp;<span class="tweet-reply-count">96</span></span></a><a class="tweet-bottom-button tweet-favorite-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">43</span></span></a>
            </div>
    </div>
</div>
@else

    <p class="tweet-text">{{$tweet->clean()}}
        @if($tweet->getDisplayHashtags())
            @foreach($tweet->hashtags as $hashtag)

                <a href="{{route('show.hashtag',$hashtag->id)}}" style="color:black; font-weight:bold;">{{$hashtag->hashtag}}</a>

            @endforeach
        @endif
    </p>
    <div class="tweet-button-wrapper w-clearfix"><a class="tweet-bottom-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">20</span></span></a><a class="retweet-button tweet-bottom-button w-button" href="#"><span class="reply-icon">&nbsp;<span class="tweet-reply-count">96</span></span></a><a class="tweet-bottom-button tweet-favorite-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">43</span></span></a>
    </div>
    </div>
    </div>

@endif

