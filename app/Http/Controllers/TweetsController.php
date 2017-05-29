<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Tweet;
use App\TweetHashtag;
use App\UserProfile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        $input['tweet'] = $request['tweet'];

        $input['user_id']=$user->id;

        $tweet=Tweet::create($input);

        if($hashtagArray=$tweet->getHashtags()){

            for($i=0; $i < count($hashtagArray[0]); $i++){

                if($hashtag=Hashtag::where('hashtag',$hashtagArray[0][$i])->first()){
                    $hashtag->popularity++;
                    $hashtag->save();

                    $tweetHashtagInput['tweet_id']=$tweet->id;
                    $tweetHashtagInput['hashtag_id']=$hashtag->id;
                    TweetHashtag::create($tweetHashtagInput);
                }else{
                    $hashtagInput['hashtag'] = $hashtagArray[0][$i];
                    $hashtag=Hashtag::create($hashtagInput);

                    $tweetHashtagInput['tweet_id']=$tweet->id;
                    $tweetHashtagInput['hashtag_id']=$hashtag->id;

                    TweetHashtag::create($tweetHashtagInput);
                }
            }

        }

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function deleteTweet(Request $request)
    {
        $tweetID = $request['tweetID'];
        $user = Auth::user();

        $tweet=Tweet::findOrFail($tweetID);

        if($tweet && $tweet->user_id == $user->id){
            $tweet->delete();
        }

    }

    public function getLatestProfileTweet(Request $request){

        if($request->ajax()){
            $user=Auth::user();
            $userID=$request['userID'];

            $tweet=Tweet::where('user_id',$userID)->latest()->first();

            if($tweet){
                return[
                    'tweet'=>view('ajax.profileLatestTweet')->with(compact('tweet','user'))->render()
                ];
            }

        }
    }

    public function showHashtag($hashtag_id){
        $hashtag=Hashtag::findOrFail($hashtag_id);

        return $hashtag->hashtag;
    }


}
