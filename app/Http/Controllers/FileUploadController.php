<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        
        $file = $request->file('file');
$originalName = $file->getClientOriginalName(); // Dohvati originalno ime
$path = $file->storeAs('uploads', $originalName, 'public'); // Sačuvaj sa originalnim imenom


        return back()->with('success', 'Fajl uspješno dodan!')->with('path', $path);
    }

    public function listFiles()
    {
        
        $files = collect(Storage::disk('public')->files('uploads'));


        return view('fajlovi.index', compact('files'));
    }

    public function downloadFile($filename)
    {
        $filePath = 'uploads/' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path("app/public/" . $filePath));
        }

        return back()->with('error', 'Fajl ne postoji.');
    }
}

