<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Materijal_usluge;
use Illuminate\Http\Request;

class MaterijalUslugeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usluga_id = 1; // ID usluge
        $materijali = DB::table('materijal_usluges')
            ->join('materijals', 'materijal_usluges.materijal', '=', 'materijals.id')
            ->where('materijal_usluges.usluga', $usluga_id)
            ->select('materijals.name', 'materijals.price', 'materijal_usluges.kolicina')
            ->get();


            //matrijal sa price vecim od 20
            $materijali_sa_vecom_cijenom = DB::table('materijal_usluges')
            ->join('materijals', 'materijal_usluges.materijal', '=', 'materijals.id')
            ->where('materijals.price', '>', 20)
            ->select('materijals.name', 'materijals.price', 'materijal_usluges.kolicina')
            ->get();

            //prikaz svih usluga sa materijalima i kolicinom
            $usluga_materials = DB::table('uslugas')
            ->join('materijal_usluges', 'uslugas.id', '=', 'materijal_usluges.usluga')
            ->join('materijals', 'materijal_usluges.materijal', '=', 'materijals.id')
            ->select('uslugas.code', 'materijals.name as material_name', 'materijal_usluges.kolicina')
            ->get();

            //prikaz svih auta i usluga koje su obavljane na njima
            $cars_services = DB::table('cars')
            ->join('uslugas', 'cars.id', '=', 'uslugas.car')
            ->select('cars.name as car_name', 'uslugas.code', 'uslugas.grade')
            ->get();

        //ispisati
        return view('materijal_usluges.index',
    [
        'materijali' =>$materijali,
        'materijali_sa_vecom_cijenom' => $materijali_sa_vecom_cijenom,
        'usluga_materials' => $usluga_materials,
        'cars_services' => $cars_services,
        
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Materijal_usluge $materijal_usluge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materijal_usluge $materijal_usluge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materijal_usluge $materijal_usluge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materijal_usluge $materijal_usluge)
    {
        //
    }
}
