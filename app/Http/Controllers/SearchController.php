<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function autocomplete(Request $request){

        if($request->ajax()) {
            $term = Input::get('term');

            $results = array();

            $queries = DB::table('user_profile')
                ->where('display_name', 'LIKE', '%' . $term . '%')
                ->orWhere('url_handle', 'LIKE', '%' . $term . '%')
                ->orWhere('handle', 'LIKE', '%' . $term . '%')
                ->take(5)->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->display_name];
            }
            return response()->json($results);
        }


    }


    public function search(Request $request){

        $query = $request->search;

        $profile= UserProfile::where('display_name',$query)->first();

        if(isset($profile)){

            return redirect()->route('show.profile',$profile->url_handle);

        }else{

            return redirect()->route('home');

        }

    }
}
