<?php

namespace App\Http\Controllers;
use App\Models\discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    /*
     * Get discount
     */
    public function getDiscount(Request $request)
    {
        //print_r($request->input('discount_code')); die();
        $text_search = $request->input('discount_code');
        $text_search = trim($text_search);
        /*$discount = DB::table('discounts')
            ->where('discount_code', '=', "{$text_search}")
            ->get();*/
        $current_date = date('Y-m-d h:m');
        $discount = discount::where('discount_code', '=', "{$text_search}")->where('start_date', '<=', "{$current_date}")
            ->where('end_date', '>=', "{$current_date}")
            ->where('active', '=', true)
            ->get();
        return response()->json(['discount' => $discount], 200);
    }
}
