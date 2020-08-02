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
		$data= DB::table('products')->get()->toArray();
		$newData = array();

		foreach ($data as $value) {
			$newData[$value->id] = $value;
		}

		if(!$request->session()->get('cart')) {
			$newData[$id]->slg = 1;
			$request->session()->put('cart', $newData);
		} else {
			$result = $request->session()->get('cart');
			if (array_key_exists('slg', $result[$id])){
				$result[$id]->slg += 1;
				$request->session()->put('cart', $result);
			} else {
				$result[$id]->slg = 1;
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
