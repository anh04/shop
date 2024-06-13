<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;


class DistrictController extends Controller
{
    /*
     * Get districts by city
     */
    public function districtsByCity(Request $request){
        $district_city_code = $request->input('district_city_code');

        $data = District::select('cities.city_name','districts.*')->
            leftJoin('cities','cities.city_code','=', 'districts.district_city_code')->
            where('districts.district_city_code','=',$district_city_code)->get();//->toSql();
        //dd($data); die();
        return response()->json(['districts' => $data], 200);
    }

    /*
    * Get Wards by districts
    */
    public function wardsByDistrict(Request $request){
        $ward_district_code = $request->input('ward_district_code');

        $data = Ward::select('districts.district_name','wards.*')->
            leftjoin('districts','districts.district_code','=', 'wards.ward_district_code')->
            where('wards.ward_district_code','=',$ward_district_code)->get();
        return response()->json(['wards' => $data], 200);
    }
}
