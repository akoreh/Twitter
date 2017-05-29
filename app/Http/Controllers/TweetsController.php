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


    public function deleteTweet(Request $request)
    {
        if(Auth::check()) {
            $tweetID = $request['tweetID'];
            $user = Auth::user();

            $tweet = Tweet::findOrFail($tweetID);

            if ($tweet && $tweet->user_id == $user->id) {
                $tweet->delete();
            }
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
        if(Auth::check()) {
            $authUser = Auth::user();
            $tweets = $hashtag->tweets()->latest()->paginate(10);
            $trendingHashtags = Hashtag::getTrending();

            return view('hashtag', compact('tweets','trendingHashtags', 'authUser'));
        }else{
            return view('hashtag',compact('tweets','trendingHashtags'));
        }
    }


}
