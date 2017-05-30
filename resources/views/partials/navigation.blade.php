


@if(Auth::check())

<div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="nav-container w-container">
        <div class="logo"></div>
        <nav class="nav-menu w-nav-menu" role="navigation"><a class="nav-link w-nav-link" href="{{route('home')}}"><span class="home-icon"></span>Home</a><a class="nav-link w-nav-link" href="#"><span class="notifications-icon"></span>Notifications</a><a class="nav-link w-nav-link" href="#"><span class="messages-icon"></span>Messages</a>
        </nav>

        <div class="nav-right"><a class="tweet-button w-button" data-ix="show-tweet-modal" href="#"><span class="tweet-button-icon"></span>Tweet</a>
            <div class="nav-dropdown w-dropdown" data-delay="0">
                <div class="nav-dropdown-toggle w-clearfix w-dropdown-toggle"><img class="image" height="35" src="/images/profiles/{{$authUser->profile->image->file}}" width="85">
                </div>
                <nav class="nav-dropdown-list w-dropdown-list w-hidden-small w-hidden-tiny">
                    <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="{{route('show.profile',$authUser->profile->url_handle)}}"><span class="nav-dropdown-username">{{$authUser->profile->display_name}}</span><br>View Profile</a>
                    </div>
                    <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="#">Lists</a><a class="nav-dropdown-link w-dropdown-link" href="#">Moments</a>
                    </div>
                    <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="#">Help Center</a><a class="nav-dropdown-link w-dropdown-link" href="#">Keyboard Shortcuts</a><a class="nav-dropdown-link w-dropdown-link" href="#">Twitter Ads</a><a class="nav-dropdown-link w-dropdown-link" href="#">Analytics</a>
                    </div>
                    <div class="nav-dropdown-link-group"><a class="nav-dropdown-link w-dropdown-link" href="{{route('settings')}}">Settings and Privacy</a><a class="nav-dropdown-link w-dropdown-link" href="{{url('/logout')}}">Log Out</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="search-form-wrapper w-form">
            <form class="search-form w-clearfix"  id="search-form" method="post" action="{{route('search')}}">
                {{csrf_field()}}
                <input class="search-field w-input"  id="search"  name="search" placeholder="Search" type="text">
                <button type="submit" class="search-button w-button" href="#"></button>
            </form>

        </div>
        <div class="w-nav-button">
            <div class="icon w-icon-nav-menu"></div>
        </div>
    </div>

</div>
    @else
    <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
        <div class="nav-container w-container">
            <div class="logo"></div>
            <nav class="nav-menu w-nav-menu" role="navigation"><a class="nav-link w-nav-link" href="{{route('home')}}"><span class="home-icon"></span>Home</a><a class="nav-link w-nav-link" href="{{route('home')}}"><span class="tweet-button-icon"></span>Login/Register</a>
            </nav>
            <div class="nav-right">

            </div>
            <div class="w-nav-button">
                <div class="icon w-icon-nav-menu"></div>
            </div>
        </div>

    </div>
@endif

<script>
    $(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $( "#search" ).autocomplete({
            source: "{{route('autocomplete')}}",
            minLength: 3,
            select: function(event, ui) {
                $('#search').val(ui.item.value);
            }
        });
    });
</script>