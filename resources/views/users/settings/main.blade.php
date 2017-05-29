@extends('layouts.app')

@section('content')

        @include('partials.navigation',$authUser)

    <div class="main-wrapper">
        <div class="w-row">
            <div class="column w-col w-col-3 w-col-stack">
                <div class="homepage-left-column-wrapper settings-left-column-wrapper w-clearfix">
                    <div class="homepage-left-column-blue-top"></div>
                    <a class="homepage-left-username" href="#">{{$authUser->profile->display_name}}</a>
                    <a class="homepage-left-handle homepage-left-username" href="#">{{$authUser->profile->handle}}</a>
                    <img class="homepage-left-column-avatar" height="72" src="/images/profiles/{{$authUser->profile->image->file}}" width="72">
                </div>
                <div class="homepage-left-column-trending-wrapper homepage-left-column-wrapper settings-nav-wrapper">
                    <ul class="settings-nav w-list-unstyled">
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading settings-nav-active-heading">Account</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Privacy and safety</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Password</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Mobile</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Email notifications</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Notifications</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Web notifications</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Find friends</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Muted accounts</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Muted words</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Blocked accounts</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Apps</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Widgets</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Your Twitter Data</h4></a>
                        </li>
                        <li class="settings-nav-item"><a class="settings-nav-element w-inline-block" href="#"><h4 class="settings-nav-heading">Accessibility</h4></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column-3 w-col w-col-6 w-col-stack">
                <div class="settings-wrapper">
                    <div class="settings-group">
                        <h2 class="settings-main-heading">Account</h2>
                    </div>
                    <div class="settings-group">
                        <div class="settings-account-form w-form">
                            <form class="settings-account-form"  method="post" action="{{route('settings.update')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="settings-field-label" for="display_name">Display Name</label>
                                    <input class="settings-text-field w-input"  id="display_name"  name="display_name"  type="text" value="{{$authUser->profile->display_name}}">
                                </div>
                                <div class="fileUpload btn btn-primary" style="display:inline-block">
                                    <span>Profile Pic</span>
                                    <input id="uploadBtn" name="file" type="file" class="upload" />
                                </div>
                                <input style="clear:both;display:block;margin: 0 auto;" class="submit-button w-button" data-wait="Please wait..." type="submit" value="Save Changes">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-2 w-col w-col-3 w-col-stack"></div>
        </div>

    </div>


@endsection