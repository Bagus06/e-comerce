<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Method;
use App\Curir;
use App\Product;
use App\Checkout;
use App\Transaksi;
use Auth;

class ProductController extends Controller
{
    public function getIndex(Request $request)
    {
    	$products = Product::all();
        notify()->error('Title', 'Description');
    	return view('shop.index', ['products' => $products]);
    }

    public function getHome(Request $request)
    {
        $products = Product::all();
        return view('shop.home', ['products' => $products]);
    }

    public function getCheck(Request $request, $token)
    {
        
        $dat = Checkout::where('token', $token)->get();
        return view('shop.checkout',compact('dat'));
    }

    public function toPay(Request $request)
    {
        $trans = Transaksi::where('user_id', Auth::user()->id)->get();
        // dd($dat);
        return view('shop.toPay',compact('trans'));
    }

    public function detailPay(Request $request, $token)
    {
        $cek = $token;
        $dat = Checkout::where('token', $cek)->get();
        // dd($dat);
        return view('shop.detail-pay',compact('dat'));
    }

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	// dd($request->session()->get('cart'));
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['product' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($cart);
        $method = Method::all();
        $del = Curir::all();
        return view('shop.shopping-cart', ['product' => $cart->items, 'totalPrice' => $cart->totalPrice,'method' => $method, 'del' => $del]);
    }

    public function deleteCart(Request $request, $id)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $key => $value) {
            if ($value['item']['id'] == $id) {
                unset($cart->items[$key]);
                $cart->remove($value['price'],$value['qty']);
            }
            // dd($value['item']['id']);
        }
        $request->session()->put('cart', $cart);
        // dd($cart->items);
        return redirect()->back();
    }

    public function cartCheck(Request $request, $id)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $key => $value) {
            if ($value['item']['id'] == $id) {
                $cart->check($value,$value['item']['id']);
            }
        }
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->route('removeItem');
    }

    public function addItem(Request $request, $id)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $key => $value) {
            if ($value['item']['id'] == $id) {
                $cart->addItem($value['item']['price']);
            }
            // dd($value['item']['id']);
        }
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function postCheck(Request $request)
    {
        $token = str_random(5);
        // dd($request->all());
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $key => $value) {
            if ($value['check'] == true) {
                $data = new Checkout();
                $data->token = $token;
                $data->jumlah = $value['qty'];
                $data->harga = $value['item']['price'];
                $data->total = $value['price'];
                $data->addres = $request->address;
                $data->note = $request->note;
                $data->user_id = Auth::user()->id;
                $data->product_id = $value['item']['id'];
                $data->curir_id = $request->delivery;
                $data->method_id = $request->pay;
                $data->save();
            }
        }

        // $delete = Cart::find($id);
        // $delete->delete();    
        return redirect('/getCheck/'.$token);
    }

    public function postCheckout(Request $request, $token)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $data = new Transaksi();
        $data->user_id = Auth::user()->id;
        $data->total_all = $request->totalAll;
        $data->token = $request->token;
        $data->mthod = $request->method;
        $data->curir = $request->curir;
        $data->save();
        // dd($data);

        Session::forget('cart');
        return redirect()->route('toPay');
    }

}
