<?php

namespace App\Http\Controllers;

use Auth;
use App\Profil;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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
        $filename = time() . '.' .  $image->getClientOriginalName();
        $path = public_path('profil/' . $filename);
        Image::make($image->getRealPath())->resize(190, 150)->save($path);

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
}