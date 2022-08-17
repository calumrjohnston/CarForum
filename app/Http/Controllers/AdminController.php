<?php

namespace App\Http\Controllers;

use App\ModelCar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function index()
      {
        $modelCars = ModelCar::orderBy('created_at', 'desc')->paginate(10);
        return view('modelCars/admin', ['modelCars'=> $modelCars]);
    }

    public function destroy($id)
    {
        $modelCar = ModelCar::findOrFail($id);
        $modelCar->delete();
        return redirect()->route('admin.dashboard')->with('message', 'Car
        Model was deleted.');
    }
}
