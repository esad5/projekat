<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = DB::table('cars')->get();
        return view('cars.index', ['cars' =>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = DB::table('brands')->get();

        return view('cars.add',['brands'=> $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('cars')->insert([
            'name' => $request->name,
            'year' => $request->year,
            'engine' => $request->engine,
            'code' => $request->code,
            'brand' => $request->brand,
        ]);
        return redirect()->route('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    public function delete(Request $request){
        $id= $request->id;
        car::destroy($id);
        return redirect()->route('cars');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $cars = DB::table('cars')->where('id',$id)->get();

        $brands = DB::table('brands')->get();

        return view('cars.edit',['cars' => $cars, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'engine' => 'required|integer',
        ]);

        $update_query = DB::table('cars')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'year' => $request->year,
            'engine' => $request->engine,
            'code' => $request->code,
            'brand' => $request->brand,
            ]);

        return redirect()->route('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
