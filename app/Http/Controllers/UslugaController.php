<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Usluga;
use Illuminate\Http\Request;

class UslugaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


      //ispisati
      $from = '2021-12-01 00:00:00';
      $to = '2026-12-31 23:59:59';

      $number_of_uslugas = DB::table('uslugas')
          ->whereBetween('date', [$from, $to])
          ->count();

        //ispisati sve usluge sa informacijama o majstorima
        $services = DB::table('uslugas')
        ->join('majstors', 'uslugas.majstor', '=', 'majstors.id')
        ->select('uslugas.*', 'majstors.name as majstor_name', 'majstors.level')
        ->orderBy('uslugas.date', 'asc') 
        ->get();

        //ispisati majstora koji je imao najveci broj usluga
        $most_active_majstor = DB::table('majstors')
        ->select('majstors.id', 'majstors.name', 'majstors.level', 'majstors.description', DB::raw('COUNT(uslugas.id) as brojac'))
        ->join('uslugas', 'majstors.id', '=', 'uslugas.majstor')
        ->groupBy('majstors.id', 'majstors.name', 'majstors.level', 'majstors.description')
        ->orderByRaw('COUNT(uslugas.id) DESC')
        ->first();

        //najbolje ocjenjeni masjtori
        $best_rated_majstors = DB::table('majstors')
    ->join('uslugas', 'majstors.id', '=', 'uslugas.majstor')
    ->join('cars', 'uslugas.car', '=', 'cars.id')
    ->select(
        'majstors.name as majstor_name',
        'majstors.level',
        'majstors.description',
        'cars.name as car_name',
        DB::raw('AVG(uslugas.grade) as average_grade')
    )
    ->groupBy('majstors.id', 'cars.id', 'majstors.name', 'majstors.level', 'majstors.description', 'cars.name')  // Dodano sve stupce koji nisu u agregatnoj funkciji
    ->orderBy('average_grade', 'DESC')
    ->get();

    //prikaz svih brendova
    $brands = DB::table('brands')->get();

    //prikaz svih majstora sa levelom
    $majstors = DB::table('majstors')->select('name', 'level')->get();


    //



    //ispisat
    return view('uslugas.index',
    [
        'number_of_uslugas' => $number_of_uslugas,
        'services' => $services,
        'most_active_majstor' => $most_active_majstor,
        'best_rated_majstors' => $best_rated_majstors,
        'brands' => $brands,
        'majstors' => $majstors,
        
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
    public function show(Usluga $usluga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usluga $usluga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usluga $usluga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usluga $usluga)
    {
        //
    }
}
