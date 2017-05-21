
                @if(count($tweets) > 0)
                    @foreach($tweets as $tweet)
                <div class="tweet-wrapper w-clearfix">
                    <div class="tweet-left-side-wrapper"><a href="{{route('show.profile',$tweet->user->profile->url_handle)}}">
                            <img class="tweet-avatar" height="48" src="/images/profiles/{{$tweet->user->profile->image->file}}" width="48"></a>
                    </div>
                    <div class="tweet-right-side-wrapper w-clearfix">
                        <a class="tweet-username" href="{{route('show.profile',$tweet->user->profile->url_handle)}}">{{$tweet->user->profile->display_name}}</a>
                        <a class="tweet-handle" href="{{route('show.profile',$tweet->user->profile->url_handle)}}">{{$tweet->user->profile->handle}}</a><span> · </span>
                        <a class="tweet-date" href="#">{{$tweet->created_at->diffForHumans()}}</a>
                        <div class="tweet-dropdown w-dropdown" data-delay="0">
                            <div class="tweet-dropdown-toggle w-dropdown-toggle">
                                <div class="w-icon-dropdown-toggle"></div>
                            </div>
                            <nav class="tweet-dropdown-list w-dropdown-list">
                                <div class="nav-dropdown-link-group">
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Share via Direct Message</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Copy link to Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Embed Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Mute {{$tweet->user->profile->handle}}</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Block {{$tweet->user->profile->handle}}</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Report Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">I don't like this tweet</a>
                                </div>
                                <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="#">Add to new Moment</a>
                                </div>
                            </nav>
                        </div>
                        @if($embed=$tweet->getEmbed())
                        <p class="tweet-text">{{$tweet->withoutURL()}}</p>

                            <blockquote class="embedly-card" data-card-controls="0"><h4><a href="{{$embed->url}}">{{$embed->title}}</a></h4><p>{{$embed->description}}</p></blockquote>
                            <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
                            <div class="tweet-button-wrapper w-clearfix"><a class="tweet-bottom-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">20</span></span></a><a class="retweet-button tweet-bottom-button w-button" href="#"><span class="reply-icon">&nbsp;<span class="tweet-reply-count">96</span></span></a><a class="tweet-bottom-button tweet-favorite-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">43</span></span></a>
                            </div>
                    </div>
                </div>
                        @else

                         <p class="tweet-text">{{$tweet->tweet}}</p>

                        <div class="tweet-button-wrapper w-clearfix"><a class="tweet-bottom-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">20</span></span></a><a class="retweet-button tweet-bottom-button w-button" href="#"><span class="reply-icon">&nbsp;<span class="tweet-reply-count">96</span></span></a><a class="tweet-bottom-button tweet-favorite-button w-button" href="#"><span class="reply-icon"> <span class="tweet-reply-count">43</span></span></a>
                        </div>
                    </div>
                </div>
                        @endif
                    @endforeach

                @endif
