<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tweet;
use Embed\Embed;
use App\Hashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()){

            $user=Auth::user();
            $followedUsers = array();
            $authUser = $user;

            foreach($user->following as $followedUser){
                array_push($followedUsers,$followedUser->id);
            }

            $tweets=Tweet::whereIn('user_id',$followedUsers)->latest()->paginate(10);
            $trendingHashtags = Hashtag::getTrending();

            if($request->ajax()){
                return[
                  'tweets'=>view('ajax.homeTweets')->with(compact('tweets','user'))->render(),
                  'next_page'=>$tweets->nextPageUrl()
                ];
            }else{

            return view('home',compact('user','tweets','authUser','trendingHashtags'));

            }
        }
        else{
            return view('welcome');
        }


    }
}
