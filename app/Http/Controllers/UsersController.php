<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Image;
use App\User;
use App\UserProfile;
use App\UserRelation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{



    public function unfollow(Request $request){

            $unfollowUserID = $request['userID'];
            $followingUser = Auth::user();

            $relationship = UserRelation::where('follower_id',$followingUser->id)->where('followed_id',$unfollowUserID )->first();

            if(isset($relationship)){
                $relationship->delete();
            }


    }


    public function follow(Request $request){

        $followedUserID = $request['userID'];
        $followingUser = Auth::user();

        $input['follower_id']=$followingUser->id;
        $input['followed_id']=$followedUserID;

        UserRelation::create($input);


    }

    public function getProfile($handle){

        $authUser = Auth::user();

        $profile=UserProfile::where('url_handle',$handle)->first();

        if($profile){
            $user = $profile->user;

            $tweets=$user->tweets()->latest()->get();
            $trendingHashtags=Hashtag::getTrending();

//            $tweets = Tweet::where('user_id', $user->id)->latest()->get();
            if(isset($authUser)) {
                return view('users.profile', compact('tweets', 'user','authUser','trendingHashtags'));
            }else{
                return view('users.profile', compact('tweets', 'user','trendingHashtags'));
            }
        }else{

            return view('errors.404');
        }
    }

    public function checkHandle(){

        $inputHandle=Input::get('handle');

        $handle = UserProfile::where('url_handle',$inputHandle)->first();

        if($handle){
            return "taken";
        }else{
            return "not taken";
        }


    }

    public function checkEmail(){

        $inputEmail=Input::get('email');

        $user = User::where('email',$inputEmail)->first();

        if($user){
            return "taken";
        }else{
            return "not taken";
        }


    }


    public function settings()
    {

        if (Auth::check()) {
           $authUser = Auth::user();

            return view('users.settings.main', compact('authUser'));
         }else{
            return view('errors.404');
        }
    }

    public function update(Request $request){

        $user=Auth::user();

        if(isset($user)) {

            $profile=UserProfile::where('user_id',$user->id)->first();

            if(isset($profile)) {
                if ($profilePic = $request->file('profile_pic')) {
                    $name = time() . $profilePic->getClientOriginalName();
                    $profilePic->move('images/profiles', $name);
                    $image = Image::create(['file' => $name]);
                    $profile->image_id = $image->id;
                }

                if ($banner = $request->file('banner')) {
                    $name = time() . $banner->getClientOriginalName();
                    $banner->move('images/profiles/banners', $name);
                    $profile->banner = $name;
                }

                $profile->display_name = $request->display_name;

                $profile->save();

                return redirect()->route('settings');
            }
        }
    }

}
