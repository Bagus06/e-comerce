<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Method;
use App\Curir;
use App\Product;
use App\Checkout;
use Auth;

class ProductController extends Controller
{
    public function getIndex(Request $request)
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getHome(Request $request)
    {
        $products = Product::all();
        return view('shop.home', ['products' => $products]);
    }

    public function getCheckout(Request $request, $id)
    {
        
        $dat = Checkout::where('id', $id)->get();
        return view('shop.checkout',compact('dat'));
    }

    public function toPay(Request $request)
    {
        $dat = Checkout::where('user_id', Auth::user()->id)->get();
        // dd($dat);
        return view('shop.toPay',compact('dat'));
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
        $method = Method::all();
        $del = Curir::all();
        return view('shop.shopping-cart', ['product' => $cart->items, 'totalPrice' => $cart->totalPrice,'method' => $method, 'del' => $del]);
    }

    public function postCheckout(Request $request)
    {
        $data = new Checkout();
        $data->jumlah = $request->qty;
        $data->harga = $request->price;
        $data->total = $request->total;
        $data->addres = $request->address;
        $data->note = $request->note;
        $data->user_id = Auth::user()->id;
        $data->product_id = $request->id;
        $data->curir_id = $request->delivery;
        $data->method_id = $request->pay;
        $data->save();

        $cek = $data->id;

        // $delete = Cart::find($id);
        // $delete->delete();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Session::forget('cart');
          if(!Session::has('cart'))
           {      
                return redirect('/checkout/'.$cek);
           }
    }

    public function postCheck(Request $request, $id)
    {

        $cek = Checkout::find($id);
        $cek->jumlah = $request->jumlah;
        $cek->harga = $request->price;
        $cek->total = $request->total;
        $cek->addres = $request->addres;
        $cek->note = $request->note;
        $cek->user_id = $request->user;
        $cek->product_id = $request->id;
        $cek->curir_id = $request->c_id;
        $cek->method_id = $request->m_id;
        $cek->save();

        $dat = Checkout::where('user_id', Auth::user()->id)->get();
        return view('shop.toPay',compact('dat'));
    }

}
