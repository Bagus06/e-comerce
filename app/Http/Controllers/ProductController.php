<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Cart;
use App\Chat;
use App\Sold;
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
    public function search(Request $request)
    {
        $name = $request->name;
        $products = Product::where('title', 'LIKE', "%$name%")->get();
        return view('shop.index', ['products' => $products]);
    }
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
    // branch
     public function x(Request $request)
    {
        $products = Product::where('user_id', 3)->get();
        $user = User::where('id', 3)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
     public function s(Request $request)
    {
        $products = Product::where('user_id', 4)->get();
        $user = User::where('id', 4)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
     public function sp(Request $request)
    {
        $products = Product::where('user_id', 5)->get();
        $user = User::where('id', 5)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
     public function a(Request $request)
    {
        $products = Product::where('user_id', 6)->get();
        $user = User::where('id', 6)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
     public function cu(Request $request)
    {
        $products = Product::where('user_id', 7)->get();
        $user = User::where('id', 7)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
     public function n(Request $request)
    {
        $products = Product::where('user_id', 8)->get();
        $user = User::where('id', 8)->get();
        $user = $user[0]->name;
        return view('shop.branch', ['products' => $products, 'user' => $user]);
    }
    // endbranch
    public function getHome(Request $request)
    {
        $products = Product::all();
        return view('shop.home', ['products' => $products]);
    }

    public function getCheck(Request $request, $token)
    {
       $dat = Checkout::where('token', $token)->get();
        $cost = $dat[0]->curir;
        $city = $dat[0]->city_id;
        $responses = Curl::to('https://api.rajaongkir.com/starter/cost')
                ->withHeader('key: a794662c34adff0b61308efd1a5ef6a6')
                ->withHeader('content-type: application/x-www-form-urlencoded')
                ->withData(array('origin' => '501', 'destination' => $city ,'weight' => '1700', 'courier' => $cost))
                ->post();

        $responses = json_decode($responses);
        $responses = $responses->rajaongkir->results[0]->costs;
        // dd($responses);
        return view('shop.checkout',compact('dat', 'responses'));
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
        Session()->put('success','Add Product to Cart successfully.');
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['product' => null]);
        }
        $oldCart = Session::get('cart');
        $method = Method::all();
        // dd($method);
        $cart = new Cart($oldCart);
        // dd($cart);
        $response = Curl::to('https://api.rajaongkir.com/starter/province')
                ->withHeader('key: a794662c34adff0b61308efd1a5ef6a6')
                ->asJson()
                ->get();
        $response = $response->rajaongkir->results;
        $responses = Curl::to('https://api.rajaongkir.com/starter/city')
                ->withHeader('key: a794662c34adff0b61308efd1a5ef6a6')
                ->asJson()
                ->get();

        $responses = $responses->rajaongkir->results;
        // dd($response);
        return view('shop.shopping-cart', ['product' => $cart->items, 'totalPrice' => $cart->totalPrice, 'response' =>$response, 'responses' =>$responses, 'method' => $method]);
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
        Session()->put('warning','Cart Delete successfully.');
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

        Session()->put('success','Cencel To Buy successfully.');
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
            $id = $cart->items[1]['item']['id'];
            $data = Product::where('id', $id)->get();
            $prod_qty = $data[0]->qty;
            $title = $data[0]->title;
            $qty = $value['qty'];

            if ($value['check'] == true) {
                if ($prod_qty < $qty) {
                    Session()->put('error','Sorry, the ' .$title. ' product stock is running out.');
                    return redirect()->back(); 
                }
                $data = new Checkout();
                $data->token = $token;
                $data->jumlah = $value['qty'];
                $data->harga = $value['item']['price'];
                $data->total = $value['price'];
                $data->addres = $request->address;
                $data->note = $request->note;
                $data->user_id = Auth::user()->id;
                $data->city_id = $request->city;
                $data->curir = $request->curir;
                $data->product_id = $value['item']['id'];
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
        $token = $request->token;
        $cek =  $request->totalAll;
        if ($cek == null) {
            Session()->put('error','Select service curir.');
            return redirect()->back(); 
        }else{            
            $data = new Transaksi();
            $data->user_id = Auth::user()->id;
            $data->total_all = $cek;
            $data->token = $token;
            $data->mthod = $request->method;
            $data->curir = $request->curir;
            $data->address = $request->address;
            $data->save();
        }
        
        // dd($data);

        Session::forget('cart');
        Session()->put('success','successfully.');
        return redirect()->route('toPay');
    }

    public function postProduct(Request $request)
    {
        $image = $request->img;
        $filename = time() . '.' .  $image->getClientOriginalName();
        $path = public_path('img/' . $filename);
        Image::make($image->getRealPath())->resize(200, 230)->save($path);

        $title = $request->title;
        $data = new Product();
        $data->imagePath = $filename;
        $data->title = $title;
        $data->description = $request->des;
        $data->type_id = $request->type;
        $data->user_id = Auth::user()->id;
        $data->qty = $request->qty;
        $data->price = $request->price;
        $data->save();
        // dd($data);
        Session()->put('info','Add product ' .$title. ' successfully.');
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
        // dd($idu);
        if ($profil->isEmpty()) {
            Session()->put('warning','Complete your profile first.');
            return redirect()->back(); 
        }else{
            $idu = $profil[0]->imagePath;
            $data = new Chat();
            $data->user_id = Auth::user()->id;
            $data->product_id = $request->id;
            $data->imagePath = $idu;
            $data->chat = $request->pesan;
            // die($data);
            $data->save();
        }
        Session()->put('info','Send comment successfully.');
        return redirect()->back();
    }

}
