<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mycontroller extends Controller
{
    public function index(){
    	$products['info'] = DB::table('products')->get();
    	return view('index', $products);
    }

    public function insertCart(Request $request){
    	$id = $request->id;
		$data= DB::table('products')->where('id', $id)->first();
		$newData = array();

		if(!$request->session()->get('cart')) {
			$data->slg = 1;
			$newData[$id] = $data;
			$request->session()->put('cart', $newData);
		} else {
			$result = $request->session()->get('cart');
			if (array_key_exists($id, $result)){
				$result[$id]->slg += 1;
				$request->session()->put('cart', $result);
			} else {
				$data->slg = 1;
				$result[$id] = $data;
				$request->session()->put('cart', $result);
			}
		} 
		return redirect()->route('index');
    }

    public function viewCart(Request $request){
    	$cart['info'] = $request->session()->get('cart');

    	return view('viewCart', $cart);
    }

    public function deleteCart(Request $request){
    	$id = $request->id;
    	$result = $request->session()->get('cart'); 

    	unset($result[$id]);
    	$request->session()->put('cart', $result);
    	return redirect()->route('viewCart');
    }

    public function updateCart(Request $request){
    	$slg = $request->slg;
    	$result = $request->session()->get('cart'); 

    	foreach ($slg as $key => $value) {
    		$result[$key]->slg = $value;
    	}
    	$result['info'] = $result;
    	return view('viewCart', $result);
    }
}
