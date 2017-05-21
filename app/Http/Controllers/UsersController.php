<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
