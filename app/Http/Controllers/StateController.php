<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Zip;

class StateController extends Controller
{
    /***********************************
     * Get districts by city
     **********************************/
    public function getcityState(Request $request){
        $state = $request->input('state');
        $data = Zip::select('city')->distinct()
            ->where('state','=',$state)->get(); //->toArray();
        //print_r($data); die();
        return response()->json(['cities' => $data], 200);
    }

    /***********************************
     * Get zip by city
     **********************************/
    public function getZip(Request $request){
        $city = $request->input('city');
        $data = Zip::select('zip')->distinct()
            ->where('city','=',$city)->get(); //->toArray();
        //print_r($data); die();
        return response()->json(['zips' => $data], 200);
    }
}
