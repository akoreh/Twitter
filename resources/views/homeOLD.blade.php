@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-3 pull-left user-info-panel">
                <div class="panel panel-default">
                    <div class="user-panel-heading panel-heading"></div>

                    <div class="panel-body">
                        <div class="pull-left">
                            <img src="/images/profiles/{{Auth::user()->profile->image->file}}" alt="" class="avatar">
                        </div>
                        <h3 class="display-name">{{$user->profile->display_name}}</h3>
                        <h5 ><a href="/{{$user->profile->url_handle}}" class="display-handle">{{$user->profile->handle}}</a></h5>
                        <div style="clear:both;">
                            <div class="pull-left" style="margin-right: 25px;">
                                <h4 class="pull-left tweets-label">Tweets</h4>
                                <div style="clear:both">
                                    <h5 class="pull-left tweets-count">0</h5>
                                </div>

                            </div>

                           <div class="pull-left">
                               <h4 class="pull-left following-label">Following</h4>
                               <div style="clear:both">
                                   <h5 class="pull-left following-count">{{count($user->following)}}</h5>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body feed-panel-body">
                        @if(count($tweets) > 0)
                            @foreach($tweets as $tweet)
                                <div class="tweet">
                                    <div class="row">
                                        <div class="col-md-1 pull-left">
                                            <a href="/{{$tweet->user->profile->url_handle}}"><img class="tweet-avatar" src="/images/profiles/{{$tweet->user->profile->image->file}}" alt=""></a>
                                        </div>
                                        <div class="col-md-11 pull-right tweet-col">
                                            <a href="/{{$tweet->user->profile->url_handle}}"><h5 class="tweet-username">{{$tweet->user->profile->display_name}}</h5></a>
                                            <a href="/{{$tweet->user->profile->url_handle}}"><h5 class="tweet-handle">{{$tweet->user->profile->handle}}</h5></a> <span> · </span>
                                            <h5 class="tweet-date">{{$tweet->created_at->diffForHumans()}}</h5>
                                            <div class="tweet-body">
                                                @if($embed=$tweet->getEmbed())
                                                    <p class="tweet-text">{{$tweet->withoutURL()}}</p>
                                                    <blockquote class="embedly-card" data-card-controls="0"><h4><a href="{{$embed->url}}">{{$embed->title}}</a></h4><p>{{$embed->description}}</p></blockquote>
                                                    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
                                                    <div class="tweet-button-wrapper">
                                                        <i class="fa fa-reply" aria-hidden="true"></i><p>64</p>
                                                        <i class="fa fa-retweet icon" aria-hidden="true"></i><p>758</p>
                                                        <i class="fa fa-heart icon" aria-hidden="true"></i><p>897</p>
                                                    </div>
                                                @else
                                                    <p>{{$tweet->tweet}}</p>

                                                    <div class="tweet-button-wrapper">
                                                        <i class="fa fa-reply" aria-hidden="true"></i><p>64</p>
                                                        <i class="fa fa-retweet icon" aria-hidden="true"></i><p>758</p>
                                                        <i class="fa fa-heart icon" aria-hidden="true"></i><p>897</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="tweet-body">
                                <h4>Nothing to show! Follow other users to see their tweets!</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-right user-info-panel">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">
                        <img src="http://www.toxel.com/wp-content/uploads/2008/07/ua2.jpg" alt="" class="advertisement">
                        <img src="https://i.ytimg.com/vi/IRiFZFTZME0/maxresdefault.jpg" alt="" class="advertisement">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
