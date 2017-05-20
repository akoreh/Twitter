@extends('layouts.app')

@section('content')

    @include('partials.navigation')

    <div class="profile-hero-section">
        <div class="profile-hero-image-wrapper"><img class="profile-hero-image" data-ix="hide-profile-navbar" sizes="100vw" src="/images/profiles/banners/{{$user->profile->banner}}">
        </div>
        <div class="profile-hero-bar profile-hero-bar-fixed w-clearfix">
            <div class="profile-hero-fixed-avatar-wrapper w-clearfix">
                <a class="nav-avatar profile-fixed-nav-avatar w-clearfix w-inline-block" href="#"><img class="fixed-profile-image image" height="50" src="/images/profiles/{{$user->profile->image->file}}" width="80">
                </a><a class="profile-fixed-username tweet-username" href="#">{{$user->profile->display_name}}</a><a class="profile-fixed-user-handle tweet-handle" href="#">{{$user->profile->handle}}</a>
            </div>
            <div class="profile-hero-button-wrapper profile-hero-button-wrapper-fixed"><a class="nav-link profile-hero-button" href="#">Tweets<br><br> <span class="profile-hero-count">{{count($user->tweets)}}</span></a><a class="nav-link profile-hero-button" href="#">Following<br><br> <span class="profile-hero-count">{{count($user->following)}}</span></a><a class="nav-link profile-hero-button" href="#">followers<br><br> <span class="profile-hero-count">{{count($user->followers)}}</span></a><a class="nav-link profile-hero-button" href="#">likes<br><br> <span class="profile-hero-count">0</span></a><a class="follow-suggestion-button profile-fixed-follow-button profile-follow-button w-button" href="#">Follow</a>
            </div><img class="image phone-profile-image" height="50" src="/images/profiles/{{$user->profile->image->file}}" width="80"><a class="phone-profile-username tweet-username" href="#">{{$user->profile->display_name}}</a><a class="phone-profile-handle tweet-handle" href="#">{{$user->profile->handle}}</a>
        </div>
        <div class="profile-hero-bar w-clearfix">
            <div class="profile-hero-button-wrapper w-clearfix"><a class="nav-link profile-hero-button" href="#">Tweets<br><br> <span class="profile-hero-count">{{count($user->tweets)}}</span></a><a class="nav-link profile-hero-button" href="#">Following<br><br> <span class="profile-hero-count">{{count($user->following)}}</span></a><a class="nav-link profile-hero-button" href="#">followers<br><br> <span class="profile-hero-count">{{count($user->followers)}}</span></a><a class="nav-link profile-hero-button" href="#">likes<br><br> <span class="profile-hero-count">0</span></a><a class="follow-suggestion-button profile-follow-button w-button" href="#">Follow</a>
            </div><img class="image phone-profile-image" height="50" src="/images/profiles/{{$user->profile->image->file}}" width="80"><a class="phone-profile-username tweet-username" href="#">{{$user->profile->display_name}}</a><a class="phone-profile-handle tweet-handle" href="#">{{$user->profile->handle}}</a>
        </div>
    </div>
    <div class="main-wrapper profile-main-wrapper"><img class="homepage-left-column-avatar profile-avatar" height="200" src="/images/profiles/{{$user->profile->image->file}}" width="200">
        <div class="profile-row w-row">
            <div class="column w-col w-col-3 w-col-stack">
                <div class="profile-user-info-wrapper">
                    <h1 class="profile-username">{{$user->profile->display_name}}</h1>
                    <h1 class="profile-handle">{{$user->profile->handle}}</h1>
                    @if($user->profile->bio != NULL)
                    <p class="profile-bio">45th President of the United States of America</p>
                    @endif
                    @if($user->profile->location != NULL)
                        <h4 class="profile-subheading w-clearfix"><span class="map-beacon-icon"></span> Washington, DC</h4>
                    @endif

                    <h4 class="profile-subheading w-clearfix" style="margin-top: 25px;"><span class="map-beacon-icon"></span>Joined {{Carbon\Carbon::parse($user->created_at)->format('F Y')}}</h4>

                </div>
            </div>
            <div class="column-3 w-col w-col-6 w-col-stack">
                @if(count($tweets) > 0)
                    @foreach($tweets as $tweet)
                        <div class="tweet-wrapper w-clearfix">
                            <div class="tweet-left-side-wrapper"><a href="{{route('show.profile',$tweet->user->profile->url_handle)}}"><img class="tweet-avatar" height="48" src="/images/profiles/{{$tweet->user->profile->image->file}}" width="48"></a>
                            </div>
                            <div class="tweet-right-side-wrapper w-clearfix"><a class="tweet-username" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->display_name}}</a><a class="tweet-handle" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->handle}}</a><span> · </span><a class="tweet-date" href="#">{{$tweet->created_at->diffForHumans()}}</a>
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
        @else
            <div class="tweet-wrapper w-clearfix">
                <h4>Nothing to show! Follow other users to see their tweets!</h4>
            </div>
        @endif
            </div>
            <div class="column-2 w-col w-col-3 w-col-stack">
                <div class="homepage-right-column-wrapper">
                    <h3 class="homepage-left-column-trending-heading">Who to follow</h3>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="images/Ms2bWRqk_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Michael Zimmerman</a><a class="follow-suggestion-handle tweet-handle" href="#">@zimm3rman</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="images/eYMXfAQX_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Maggie</a><a class="follow-suggestion-handle tweet-handle" href="#">@margaretjhowell</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                    <div class="follow-column-wrapper w-clearfix"><img class="follow-suggestion-avatar" height="48" src="images/5UgMNCwA_normal.jpg" width="48">
                        <div class="follower-suggestion-aux-div w-clearfix"><a class="follow-suggestion-username tweet-username" href="#">Breitbart News</a><a class="follow-suggestion-handle tweet-handle" href="#">@BreitbartNews</a><a class="follow-suggestion-button w-button" href="#"><span class="follow-icon"></span>Follow</a>
                        </div>
                    </div>
                </div>
                <div class="homepage-left-column-trending-wrapper homepage-left-column-wrapper w-clearfix">
                    <h3 class="homepage-left-column-trending-heading">Trending</h3>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#BattleOfBucharest</a>
                        <h6 class="trending-tweet-count">4,505 Tweets</h6>
                    </div>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#ThreeWordTrump</a>
                        <h6 class="trending-tweet-count">17,454 Tweets</h6>
                    </div>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#Romanian</a>
                        <h6 class="trending-tweet-count">1,631 Tweets</h6>
                    </div>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#saturdaymorning</a>
                        <h6 class="trending-tweet-count">8,034 Tweets</h6>
                    </div>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#WorldWhiskyDay</a>
                        <h6 class="trending-tweet-count">3,274 Tweets</h6>
                    </div>
                    <div class="homepage-left-column-trending-element-wrapper"><a class="trending-hashtag" href="#">#AFLPiesHawks</a>
                        <h6 class="trending-tweet-count">5,204 Tweets</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
