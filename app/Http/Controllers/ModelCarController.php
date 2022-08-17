<?php

namespace App\Http\Controllers;

use App\Twitter;
use App\Brand;
use App\ModelCar;
use Illuminate\Http\Request;

class ModelCarController extends Controller
{

  public function exampleMethod(ModelCar $modelCar, Twitter $t){

    dd($t);
    return "Example method";
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $modelCars = ModelCar::orderBy('created_at', 'desc')->paginate(25);
      return view('modelCars.index', ['modelCars'=> $modelCars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $brands = Brand::orderBy('name','asc')->get();
      return view ('modelCars.create', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'doors' => 'required|numeric',
        'engine_size' => 'required|numeric',
        'brand_id' => 'required|integer',
      ]);
        $a = new ModelCar;
        $a->name = $validatedData['name'];
        $a->doors = $validatedData['doors'];
        $a->engine_size = $validatedData['engine_size'];
        $a->brand_id = $validatedData['brand_id'];
        $a->save();
        session()->flash('message', 'Car Model was created.');
        return redirect()->route('modelCars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelCar $modelCar)
    {
      //$modelCar = ModelCar::findOrFail($id);
      return view('modelCars.show', ['modelCar'=>$modelCar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelCar = ModelCar::findOrFail($id);
        $modelCar->delete();
        return redirect()->route('modelCars.index')->with('message', 'Car
        Model was deleted.');
    }
}
