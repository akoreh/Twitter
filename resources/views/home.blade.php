@extends('layouts.app')


@section('content')

@include('partials.navigation',$authUser)

    <div class="main-wrapper">
        <div class="w-row">
            <div class="column w-col w-col-3 w-col-stack">
                <div class="homepage-left-column-wrapper w-clearfix">
                    <div class="homepage-left-column-blue-top"></div>
                    <a class="homepage-left-username" href="{{route('show.profile',$user->profile->url_handle)}}">{{$user->profile->display_name}}</a>
                    <a class="homepage-left-handle homepage-left-username" href="{{route('show.profile',$user->profile->url_handle)}}">{{$user->profile->handle}}</a>
                    <img class="homepage-left-column-avatar" height="72" src="/images/profiles/{{$user->profile->image->file}}" width="72">
                    <div class="homepage-left-column-tweet-count-wrapper w-clearfix">
                        <h3 class="homepage-left-column-count-heading">Tweets</h3><a class="tweet-count" id="home-tweet-count" href="#">{{count($user->tweets)}}</a>
                    </div>
                    <div class="homepage-left-column-follower-count-wrapper homepage-left-column-tweet-count-wrapper w-clearfix">
                        <h3 class="following-count homepage-left-column-count-heading">Following</h3><a class="following-count tweet-count"  href="#">{{count($user->following)}}</a>
                    </div>
                </div>
                <div class="homepage-left-column-trending-wrapper homepage-left-column-wrapper w-clearfix">
                    <h3 class="homepage-left-column-trending-heading">Trending</h3>

                    @foreach($trendingHashtags as $hashtag)
                        <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="{{route('show.hashtag',$hashtag->id)}}">{{$hashtag->hashtag}}</a>
                            <h6 class="trending-tweet-count">{{$hashtag->popularity}} Tweets</h6>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="endless-pagination" class="column-3 w-col w-col-6 w-col-stack" data-next-page="{{$tweets->nextPageUrl()}}">
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
                        <p class="tweet-text">{{$tweet->clean()}}</p>
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
                    @endforeach
                @else
            <div class="tweet-wrapper w-clearfix">
                    <h4 class="no-tweets-alert">Nothing to show! Follow other users to see their tweets!</h4>
            </div>
                @endif
            </div>

            {{--WHO TO FOLLOW SECTION--}}
            <div class="column-2 w-col w-col-3 w-col-stack">
                <div class="homepage-right-column-wrapper">
                    <h3 class="homepage-left-column-trending-heading">Who to follow</h3>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="/images/Ms2bWRqk_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Michael Zimmerman</a><a class="follow-suggestion-handle tweet-handle" href="#">@zimm3rman</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="/images/eYMXfAQX_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Maggie</a><a class="follow-suggestion-handle tweet-handle" href="#">@margaretjhowell</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="/images/5UgMNCwA_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Breitbart News</a><a class="follow-suggestion-handle tweet-handle" href="#">@BreitbartNews</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="{{asset('js/scroll.js')}}"></script>
@endsection