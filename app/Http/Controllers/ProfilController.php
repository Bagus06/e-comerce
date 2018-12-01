<?php

namespace App\Http\Controllers;

use Auth;
use App\Profil;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Ixudra\Curl\Facades\Curl;

class ProfilController extends Controller
{
    public function memberProfil(Request $request)
    {
    	$data = Profil::where('user_id', Auth::user()->id)->get();
    	$prod = Product::where('user_id', Auth::user()->id)->get();
    	// dd($data[0]->user->name);
    	return view('shop.profil', compact('data', 'prod'));
    }
    public function postProfil(Request $request)
    {	
    	$image = $request->img;
    	if ($image == null) {
    		$image = $request->is;
    		$filename = $image;
    	}else{
	        $filename = time() . '.' .  $image->getClientOriginalName();
	        $path = public_path('profil/' . $filename);
	        Image::make($image->getRealPath())->resize(190, 150)->save($path);
    	}

        $data = Profil::where('user_id', Auth::user()->id)->first();
        $data->phone = $request->phone;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->website = $request->website;
        $data->imagePath = $filename;
        // dd($data);
        $data->save();

        return redirect()->route('memberProfil');
    }
    public function makeProfil(Request $request)
    {	
        $data = new Profil();
        $data->user_id = Auth::user()->id;
        // dd($data);
        $data->save();

        return redirect()->route('memberProfil');
    }

    public function RajaOngkir()
    {
        $response = Curl::to('https://api.rajaongkir.com/starter/province')
                ->withHeader('key: a794662c34adff0b61308efd1a5ef6a6')
                ->asJson()
                // ->withHeader('content-type: application/x-www-form-urlencoded')
                // ->withData(array('origin' => '501', 'destination' => '114' ,'weight' => '1700', 'courier' => 'jne'))
                ->get();

        $responses = $response->rajaongkir->results;
        // dd($response);
        return view ('shop.coba', compact('responses'));
                foreach ($response->rajaongkir->results as $key => $value) {
                    echo $value->province_id;
                    echo " ";
                    echo $value->province;
                    echo "<br>";
                }
    }
}