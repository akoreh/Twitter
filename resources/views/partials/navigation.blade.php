{{--<div class="alert alert-success success-alert top-alert" role="alert">Tweet Posted!</div>--}}
{{--<div class="alert alert-danger error-alert top-alert" role="alert">Failed to Post!</div>--}}
{{--<script>$('.top-alert').animate({bottom: '+=500'},{duration: 1})</script>--}}

<div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="nav-container w-container">
        <div class="logo"></div>
        <nav class="nav-menu w-nav-menu" role="navigation"><a class="nav-link w-nav-link" href="#"><span class="home-icon"></span>Home</a><a class="nav-link w-nav-link" href="#"><span class="notifications-icon"></span>Notifications</a><a class="nav-link w-nav-link" href="#"><span class="messages-icon"></span>Messages</a>
        </nav>
        <div class="nav-right w-clearfix"><a class="tweet-button w-button" data-ix="show-tweet-modal" href="#"><span class="tweet-button-icon"></span>Tweet</a>
            <a class="nav-avatar w-clearfix w-inline-block" href="#"><img class="image" height="35" src="/images/profiles/{{$user->profile->image->file}}" width="45">
            </a>
        </div>
        <div class="w-nav-button">
            <div class="icon w-icon-nav-menu"></div>
        </div>
    </div>
</div>