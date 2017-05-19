@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-3 pull-left">
                    <div class="panel panel-default">
                        <div class="user-panel-heading panel-heading"></div>

                        <div class="panel-body">
                            <div class="pull-left">
                                <img src="/images/profiles/{{$user->profile->image->file}}" alt="" class="avatar">
                            </div>
                            <h3>{{$user->profile->display_name}}</h3>
                            <h5>{{$user->profile->handle}}</h5>
                            <div style="clear:both">
                                <h4 class="pull-left">Tweets</h4>
                                <h4 class="pull-right">Following</h4>
                            </div>
                            <div style="clear:both">
                                <h5 class="pull-left">0</h5>
                                <h5 class="pull-right">{{count($user->following)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div class="panel-body feed-panel-body">
                            @if($tweets)
                                @foreach($tweets as $tweet)
                                    <div class="tweet">
                                        <img class="tweet-avatar" src="/images/profiles/{{$tweet->user->profile->image->file}}" alt="">
                                        <h5 class="tweet-username">{{$tweet->user->profile->display_name}}</h5>
                                        <h5 class="tweet-handle">{{$tweet->user->profile->handle}}</h5> <span> · </span>
                                        <h5 class="tweet-date">{{$tweet->created_at->diffForHumans()}}</h5>
                                        <div class="tweet-body">
                                            @if($embed=$tweet->getEmbed())
                                                {{$tweet->withoutURL()}}
                                                <blockquote class="embedly-card" data-card-controls="0"><h4><a href="{{$embed->url}}">{{$embed->title}}</a></h4><p>{{$embed->description}}</p></blockquote>
                                                <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
                                            @else
                                                <p>{{$tweet->tweet}}</p>
                                            @endif
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
                <div class="col-md-3 pull-right">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
