@extends('layouts.app')

@section('content')
@if(Auth::check())
    @include('partials.navigation',$authUser)
  @else
    @include('partials.navigation')
@endif
    <div class="profile-hero-section">
        <div class="profile-hero-image-wrapper"><img class="profile-hero-image" data-ix="hide-profile-navbar" sizes="100vw" src="/images/profiles/banners/{{$user->profile->banner}}">
        </div>
        <div class="profile-hero-bar profile-hero-bar-fixed w-clearfix">
            <div class="profile-hero-fixed-avatar-wrapper w-clearfix">
                <a class="nav-avatar profile-fixed-nav-avatar w-clearfix w-inline-block" href="#"><img class="fixed-profile-image image" height="50" src="/images/profiles/{{$user->profile->image->file}}" width="80">
                </a><a class="profile-fixed-username tweet-username" href="#">{{$user->profile->display_name}}</a><a class="profile-fixed-user-handle tweet-handle" href="#">{{$user->profile->handle}}</a>
            </div>
            <div class="profile-hero-button-wrapper profile-hero-button-wrapper-fixed">
                <a class="nav-link profile-hero-button" href="#">Tweets<br><br> <p class="profile-hero-count profile-tweet-count" >{{count($user->tweets)}}</p></a>
                <a class="nav-link profile-hero-button" href="#">Following<br><br> <span class="profile-hero-count">{{count($user->following)}}</span></a>
                <a class="nav-link profile-hero-button" href="#">followers<br><br> <span class="profile-hero-count">{{count($user->followers)}}</span></a>
                <a class="nav-link profile-hero-button" href="#">likes<br><br> <span class="profile-hero-count">0</span></a>
                @if(Auth::check() && $user->profile->url_handle != Auth::user()->profile->url_handle && !Auth::user()->checkFollowing($user))

                    <button id="fixed-follow-button" class="follow-suggestion-button profile-fixed-follow-button profile-follow-button w-button" href="#">Follow</button>

                @elseif(Auth::check() && $user->profile->url_handle != Auth::user()->profile->url_handle && Auth::user()->checkFollowing($user))

                    <button id="fixed-follow-button" class="follow-suggestion-button profile-follow-button profile-unfollow-button profile-follow-button-fixed w-button" href="#">Following</button>

                @endif

            </div><img class="image phone-profile-image" height="50" src="/images/profiles/{{$user->profile->image->file}}" width="80"><a class="phone-profile-username tweet-username" href="#">{{$user->profile->display_name}}</a><a class="phone-profile-handle tweet-handle" href="#">{{$user->profile->handle}}</a>
        </div>
        <div class="profile-hero-bar w-clearfix">
            <div class="profile-hero-button-wrapper w-clearfix">
                <a class="nav-link profile-hero-button" href="#">Tweets<br><br> <span class="profile-hero-count profile-tweet-count">{{count($user->tweets)}}</span></a>
                <a class="nav-link profile-hero-button" href="#">Following<br><br> <span class="profile-hero-count">{{count($user->following)}}</span></a>
                <a class="nav-link profile-hero-button" href="#">followers<br><br> <span class="profile-hero-count">{{count($user->followers)}}</span></a>
                <a class="nav-link profile-hero-button" href="#">likes<br><br> <span class="profile-hero-count">0</span></a>


                @if(Auth::check() && $user->profile->url_handle != Auth::user()->profile->url_handle && !Auth::user()->checkFollowing($user))

                    <button data-state="Follow" id="follow-button" class="follow-suggestion-button profile-follow-button w-button" href="#">Follow</button>

                @elseif(Auth::check() && $user->profile->url_handle != Auth::user()->profile->url_handle && Auth::user()->checkFollowing($user))

                    <button data-state="Following" id="follow-button" class="follow-suggestion-button profile-follow-button profile-unfollow-button w-button" href="#">Following</button>

                @endif

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
            <div class="column-3 w-col w-col-6 w-col-stack" id="tweet-column">
                @if(count($tweets) > 0)
                    @foreach($tweets as $tweet)
                        <div class="tweet-wrapper w-clearfix" data-tweet-id="{{$tweet->id}}" >
                <div class="tweet-left-side-wrapper"><a href="{{route('show.profile',$tweet->user->profile->url_handle)}}"><img class="tweet-avatar" height="48" src="/images/profiles/{{$tweet->user->profile->image->file}}" width="48"></a>
                </div>
                <div class="tweet-right-side-wrapper w-clearfix">
                    <a class="tweet-username" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->display_name}}</a>
                    <a class="tweet-handle" href="{{route('show.profile',$user->profile->url_handle)}}">{{$tweet->user->profile->handle}}</a><span> · </span>
                    <a class="tweet-date" href="#">{{$tweet->created_at->diffForHumans()}}</a>

                    @if(Auth::check() && $user->profile->url_handle == Auth::user()->profile->url_handle)

                        <div class="tweet-dropdown w-dropdown" data-delay="0">
                            <div class="tweet-dropdown-toggle w-dropdown-toggle">
                                <div class="w-icon-dropdown-toggle"></div>
                            </div>
                            <nav class="tweet-dropdown-list w-dropdown-list">
                                <div class="nav-dropdown-link-group">
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Share via Direct Message</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Copy link to Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Embed Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Pin to your profile page</a>
                                    <a class="nav-dropdown-link w-dropdown-link profile-tweet-delete-button" href="#">Delete tweet</a>
                                </div>
                                <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="#">Add to new Moment</a>
                                </div>
                            </nav>
                        </div>


                    @else
                        <div class="tweet-dropdown w-dropdown" data-delay="0">
                            <div class="tweet-dropdown-toggle w-dropdown-toggle">
                                <div class="w-icon-dropdown-toggle"></div>
                            </div>
                            <nav class="tweet-dropdown-list w-dropdown-list">
                                <div class="nav-dropdown-link-group">
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Share via Direct Message</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Copy link to Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Embed Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Mute @SkyNewsAus</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Block @SkyNewsAus</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">Report Tweet</a>
                                    <a class="nav-dropdown-link w-dropdown-link" href="#">I don't like this tweet</a>
                                </div>
                                <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="#">Add to new Moment</a>
                                </div>
                            </nav>
                        </div>

                    @endif


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
                <h4 class="no-tweets-alert">No Tweets</h4>
            </div>
        @endif
    </div>
    <div class="column-2 w-col w-col-3 w-col-stack">
        @if(Auth::check())
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
        @endif
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

@if(Auth::check())

@section('footer')

    <script>

        $('#follow-button').on('click',function(e){

            if($('#follow-button').html() === "Following"){
                $.ajax({
                    type:'delete',
                    url:'/unfollow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        userID: {{$user->id}}
                    },
                    success:function(){
                        $('#follow-button').removeClass('profile-unfollow-button').html("Follow");
                    },
                    error: function(xhr){
                    }
                });
            }

            else if($('#follow-button').html() === "Follow"){
                $.ajax({
                    type:'post',
                    url:'/follow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        userID: {{$user->id}}
                    },
                    success:function(){
                        $('#follow-button').addClass('profile-unfollow-button').html("Following");
                    },
                    error: function(xhr){
                    }
                });
            }
        });

        $('#fixed-follow-button').on('click',function(e){

            if($('#fixed-follow-button').html() === "Following"){

                $.ajax({
                    type:'delete',
                    url:'/unfollow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        userID: {{$user->id}}
                    },
                    success:function(){

                        $('#fixed-follow-button').removeClass('profile-unfollow-button').html("Follow");
                    },
                    error: function(xhr){
                    }

                });


            }

            else if($('#fixed-follow-button').html() === "Follow"){


                $.ajax({
                    type:'post',
                    url:'/follow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        userID: {{$user->id}}
                    },
                    success:function(){
                        $('#follow-button').addClass('profile-unfollow-button').html("Following");
                    },
                    error: function(xhr){
                    }

                });


            }
        });

    </script>

    @if(Auth::check() && $user->profile->url_handle == Auth::user()->profile->url_handle)
    <script>

        //DELETE TWEET

        $('.profile-tweet-delete-button').each(function(){
            $(this).on('click',function(){

                $element = $(this).closest('.tweet-wrapper');

                $.ajax({
                    type:'post',
                    url:'{{URL::route('delete-tweet')}}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        tweetID : $element.data('tweet-id')
                    }
                    ,
                    success:function(){

                        $element.fadeTo( "fast" , 0.5, function() {
                            $(this).remove();
                        });
                        successAlert("Tweet deleted!");

                        var tweetCount = parseInt($('.profile-tweet-count').html());
                        tweetCount--;
                        $('.profile-tweet-count').html(tweetCount);

                    },
                    error: function(){
                        errorAlert("Failed to delete tweet!");
                    }
                });

            });
        });

        function getLatestTweet(){
            $.ajax({
                type:'get',
                url:'{{route('get-latest-profile-tweet')}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    userID: {{Auth::user()->id}}
                },
                success:function(data){

                    $('#tweet-column').prepend(data.tweet)
                    var profileTweetCount = parseInt($('.profile-tweet-count').html());
                    profileTweetCount++;
                    $('.profile-tweet-count').html(profileTweetCount);
                },
                error: function(){
                    alert("Error");
                }
            });
        }

    </script>
    @endif

@endsection

@endif
