<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

  public function page(){
    return view('brands.index');
  }

  public function apiIndex(){
    $brands = Brand::all();
    return $brands;
  }

  public function apiStore(Request $request){
    {

      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'headquarters' => 'required|max:255',
        'founder' => 'required|max:255',
        'phonenumber' => 'required|max:14',
        'email' => 'required|max:255',
      ]);

    $b = new Brand;
    $b->name = $validatedData['name'];
    $b->headquarters = $validatedData['headquarters'];
    $b->founder = $validatedData['founder'];
    $b->phonenumber = $validatedData['phonenumber'];
    $b->email = $validatedData['email'];
    $b->name = $request['name'];
    $b->headquarters = $request['headquarters'];
    $b->founder = $request['founder'];
    $b->phonenumber = $request['phonenumber'];
    $b->email = $request['email'];
    $b->save();
    return $b;
  }

}
}
