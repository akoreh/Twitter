<?php

namespace App\Http\Controllers;

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

        $profile=UserProfile::where('url_handle',$handle)->first();

        if($profile){
            $user = $profile->user;

            $tweets=$user->tweets()->latest()->get();


//            $tweets = Tweet::where('user_id', $user->id)->latest()->get();

            return view('users.profile', compact('tweets', 'user'));
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


}
