<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use App\Models\City;
use App\Models\State;
use App\Models\Zip;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        return view('products.product');
    }
    /*****************************************/
    public function saveProduct(Request $request)
    {
        $validated = $request->validate([
            'prd_type' => 'required',
            'prd_name' => 'required',
            'prd_quantity' => 'required',
            'prd_price' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);

        /*if ($request->file('prd_img') == null) {
            $path = "";
        }else{
            $image = $request->file('prd_img');
            //$ext = $image->extension();
            $image_name = $image->getClientOriginalName();
            //$path = $request->file('prd_img')->store('products');
            $path = $request->file('prd_img')->storeAs('products', $image_name, 'local');
        }*/
        //die($path);
        $data= array();
        $multi_sexes ='';
        $multi_sizes='';
        foreach($input as $key=>$value){
            if($value !=''){
                if($key =='prd_male'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_female'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_unknown'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_small'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_medium'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_x'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_xl'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_price'){
                    $data[$key] = preg_replace('/\$|\s+|\,+|\.00$/', '', $value);
                }elseif($key =='prd_regular_price'){
                    $data[$key] = preg_replace('/\$|\s+|\,+|\.00$/', '', $value);
                }else{
                    $data[$key] = $value;
                }
            }
        }
        if($multi_sexes !=''){
            $data['multi_sexes'] = $multi_sexes;
        }
        if($multi_sizes !=''){
            $data['multi_sizes'] = $multi_sizes;
        }

        // print_r($data);
        // die();

        Product::create($data);
        return back()->with('success','New product is added successfully.');
        // return redirect()->back()->with('success','New product is added successfully.');
        // ->withSuccess('New product is added successfully.');
        //return redirect()->route('pduct.add-product')
        //    ->withSuccess('New product is added successfully.');

    }

    /*****************************************/
    public function updateproduct(Request $request)
    {
        $validated = $request->validate([
            'prd_type' => 'required',
            'prd_name' => 'required',
            'prd_quantity' => 'required',
            'prd_price' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);

        $data= array();
        $multi_sexes ='';
        $multi_sizes='';
        foreach($input as $key=>$value){
            if($value !=''){
                if($key =='prd_male'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_female'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_unknown'){
                    $multi_sexes =($multi_sexes=='')?$value:$multi_sexes.','.$value;
                }elseif($key =='prd_small'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_medium'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_x'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_xl'){
                    $multi_sizes =($multi_sizes=='')?$value:$multi_sizes.','.$value;
                }elseif($key =='prd_price'){
                    $data[$key] = preg_replace('/\$|\s+|\,+|\.00$/', '', $value);
                }elseif($key =='prd_regular_price'){
                    $data[$key] = preg_replace('/\$|\s+|\,+|\.00$/', '', $value);
                }else{
                    $data[$key] = $value;
                }
            }
        }
        if($multi_sexes !=''){
            $data['multi_sexes'] = $multi_sexes;
        }
        if($multi_sizes !=''){
            $data['multi_sizes'] = $multi_sizes;
        }

//        print_r($prd_id);
//        die();
        $prd_id = request()->route('prd_id');
        Product::where('prd_id', $prd_id)->update($data);
        return back()->with('success','New product is added successfully.');

    }
    /************************************/
    public function searchProductType(Request $request)
    {
        //print_r($request->input('text_search')); die();
        $text_search = $request->input('text_search');
        $prd_types = DB::table('product_types')
            ->where('prd_type_name', 'like', "{$text_search}%")
            ->get();
        return response()->json(['prd_types' => $prd_types], 200);
    }

    /************************************/
    public function productList()
    {
        $products = Product::select('products.*','product_types.prd_type_name')
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')
            ->orderBy('prd_type', 'desc')->orderBy('prd_sex', 'desc')->
            paginate(20);
//        $products = DB::table('products')
//            ->join('product_types', 'product_types.prd_type_id', '=', 'products.prd_type')
//            ->orderBy('articles.created_at', 'desc')
//            ->select('product_types.prd_type_name')
//            ->paginate(15);
        //print_r($products);die();
        //return view('pduct.products',);compact('products');
        return view('products.products', ['products' => $products]);
    }

    /************************************/
    public function femalePoloShirt()
    {
        $products = Product::select('products.*','product_types.prd_type_name',DB::raw('SUM(order_products.order_product_qty) AS amount_of_sold'))
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')
            ->leftJoin('order_products','order_products.order_products_id','=','products.prd_id')
            ->where('product_types.prd_type_name','=','polo shirt')
            ->where('products.prd_sex','=','female')
            ->groupBy('products.prd_id')
            ->groupBy('product_types.prd_type_name')
            ->orderBy('prd_type', 'desc')
            ->paginate(20);
        return view('femalePoloShirt', ['products' => $products]);
    }

    /************************************/
    public function femaleNoNeckTShirt()
    {
        $products = Product::select('products.*','product_types.prd_type_name',DB::raw('SUM(order_products.order_product_qty) AS amount_of_sold'))
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')
            ->leftJoin('order_products','order_products.order_products_id','=','products.prd_id')
            ->where('product_types.prd_type_name','=','No neck T-shirt')
            ->where('products.prd_sex','=','female')
            ->groupBy('products.prd_id')
            ->groupBy('product_types.prd_type_name')
            ->orderBy('prd_type', 'desc')
            ->paginate(20);

        return view('femaleNoNeckTShirt', ['products' => $products]);
    }
    /************************************/
    public function malePoloShirt()
    {
        $products = Product::select('products.*','product_types.prd_type_name',DB::raw('SUM(order_products.order_product_qty) AS amount_of_sold'))
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')
            ->leftJoin('order_products','order_products.order_products_id','=','products.prd_id')
            ->where('product_types.prd_type_name','=','polo shirt')
            ->where('products.prd_sex','=','male')
            ->groupBy('products.prd_id')
            ->groupBy('product_types.prd_type_name')
            ->orderBy('prd_type', 'desc')
            -> paginate(20);
        return view('malePoloShirt', ['products' => $products]);
    }

    /************************************/
    public function maleNoNeckTShirt()
    {
        $products = Product::select('products.*','product_types.prd_type_name',DB::raw('SUM(order_products.order_product_qty) AS amount_of_sold'))
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')
            ->leftJoin('order_products','order_products.order_products_id','=','products.prd_id')
            ->where('product_types.prd_type_name','=','No neck T-shirt')
            ->where('products.prd_sex','=','male')
            ->groupBy('products.prd_id')
            ->groupBy('product_types.prd_type_name')
            ->orderBy('prd_type', 'desc')
            -> paginate(20);
        //print_r($products); die();
        return view('maleNoNeckTShirt', ['products' => $products]);
    }
    /**************************************/
    public function edit($id)
    {
        $product_detail = Product::select('products.*','product_types.prd_type_name')
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')->find($id);
        //print_r($product_detail); die();
        //return redirect('product')->with(['product'=>$product_detail]); //xem view redirect with data
        return view('products.product')->with(['product'=>$product_detail]);

    }
    /***********************************/
    public function aothun($id){
        $product_detail = Product::select('products.*','product_types.prd_type_name')
            ->leftJoin('product_types','product_types.prd_type_id','=','products.prd_type')->find($id);

        $current_date = date('Y-m-d h:m');
        $discount = Discount::where('start_date', '<=', "{$current_date}")
            ->where('end_date', '>=', "{$current_date}")
            ->where('active', '=', true)
            ->get();
        return view('products.aothun')->with(['product'=>$product_detail,'discounts'=>$discount]);
    }

    /***********************************/
    public function cart(){
        $current_date = date('Y-m-d h:m');
        $discount = Discount::where('start_date', '<=', "{$current_date}")
            ->where('end_date', '>=', "{$current_date}")
            ->where('active', '=', true)
            ->get();
        return view('checkout.cart')->with(['discounts'=>$discount]);
    }

    /***********************************/
    public function payment(){
        $current_date = date('Y-m-d h:m');
        $discount = Discount::where('start_date', '<=', "{$current_date}")
            ->where('end_date', '>=', "{$current_date}")
            ->where('active', '=', true)
            ->get();

        //$data = City::select('cities.*')->get();
        $data = State::select('code','state')->get();

        return view('checkout.payment')->with(['discounts'=>$discount, 'states' => $data]);
    }
    /***********************************/

}
