<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tweet;
use Embed\Embed;
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
    public function index()
    {
        if(Auth::check()){

            $user=Auth::user();
            $followedUsers = array();

            foreach($user->following as $followedUser){
                array_push($followedUsers,$followedUser->id);
            }

            $tweets=Tweet::whereIn('user_id',$followedUsers)->latest()->get();




            return view('home',compact('user','tweets'));
        }
        else{
            return view('welcome');
        }


    }
}
