<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Chat;
use App\Profil;
use App\Method;
use App\Curir;
use App\Type;
use App\Product;
use App\Checkout;
use App\Transaksi;
use Auth;

class ProductController extends Controller
{
    public function yourProduct(Request $request)
    {
        $type = Type::all();
        $data = Product::where('user_id', Auth::user()->id)->get();
        return view('shop.yourProduct', compact('type','data'));
    }

    public function detailProduct($id)
    {
        $type = Type::all();
        $chat = Chat::where('product_id', $id)->get();
        $data = Product::where('id', $id)->get();
        return view('shop.product-detail', compact('type','chat','profil','data'));
    }

    public function getIndex(Request $request)
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }
    // short by

     public function e(Request $request)
    {
        $products = Product::where('type_id', 1)->get();
        return view('shop.index', ['products' => $products]);
    }

     public function c(Request $request)
    {
        $products = Product::where('type_id', 2)->get();
        return view('shop.index', ['products' => $products]);
    }
     public function b(Request $request)
    {
        $products = Product::where('type_id', 3)->get();
        return view('shop.index', ['products' => $products]);
    }
    // end short by
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

    public function cencelBuy(Request $request, $id)
    {
        $checkout = Transaksi::where('id', $id)->first()->token;
        $check = Checkout::where('token', $checkout)->get()->each->delete();
        $transaksi = Transaksi::where('id', $id)->get()->each->delete();

        return redirect()->route('toPay');
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
        $data->address = $request->addres;
        $data->save();
        // dd($data);

        Session::forget('cart');
        return redirect()->route('toPay');
    }

    public function postProduct(Request $request)
    {
        $image = $request->img;
        $filename = time() . '.' .  $image->getClientOriginalName();
        $path = public_path('img/' . $filename);
        Image::make($image->getRealPath())->resize(200, 230)->save($path);

        $data = new Product();
        $data->imagePath = $filename;
        $data->title = $request->title;
        $data->description = $request->des;
        $data->type_id = $request->type;
        $data->user_id = Auth::user()->id;
        $data->qty = $request->qty;
        $data->price = $request->price;
        $data->save();
        // dd($data);

        return redirect()->route('yourProduct');
    }

    public function kurang($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->kurang($id);
        
        Session::put('cart', $cart);
        $oldCart = Session::get('cart');
        // dd($oldCart);
        return redirect()->route('product.shoppingCart');
    }

    public function tambah($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->tambah($id);
        
        Session::put('cart', $cart);
        $oldCart = Session::get('cart');
        // dd($oldCart);
        return redirect()->route('product.shoppingCart');
    }

    public function cencelCheck($token)
    {
        $delete = Checkout::where('token', $token)->get()->each->delete();
        // dd($delete);
        // $delete->delete(['items']);
        return redirect()->route('product.shoppingCart');
    }

    public function comment(Request $request)
    {   
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        $idu = $profil;
        if ($idu->isEmpty()) {
            return redirect()->back(); 
        }else{ 
            $data = new Chat();
            $data->user_id = Auth::user()->id;
            $data->product_id = $request->id;
            $data->imagePath = $idu;
            $data->chat = $request->pesan;
            // die($data);
            $data->save();
        }

        return redirect()->back();
    }

}
