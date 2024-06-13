<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;

class IsValidAcessOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $order_id = $request->route('order_id');

            $order = Order::select('user_id')->where('order_id','=',$order_id)->get()->toArray();
           // print_r($order[0]['user_id']); die();
            if(isset($order[0]['user_id'])){
                if($order[0]['user_id'] == $user_id){
                    return $next($request);
                }
            }
            return back()->withErrors(['You can not access the Order']);
        } else {
            return back()->withErrors(['Please login']);//redirect('/');
        }
    }
}
