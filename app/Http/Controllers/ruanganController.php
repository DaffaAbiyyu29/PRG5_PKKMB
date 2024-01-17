<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='Ruangan';
        $data = Ruangan::all();
        return view ('ruangan.index',compact('title'),['ruangan' => $data],);
    }
    public function TambahRuangan()
    {
        $title ='Ruangan';
        return view ('ruangan.create',compact('title'));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'rng_namaruangan' => 'required|string|max:255',
        ], [
            'rng_namaruangan.required' => 'The Name field is required.',
        ]);
    
        $validateData['rng_status'] = 'aktif'; // Set 'tmp_status' here
    
        Ruangan::create($validateData);
    
        return redirect()->route('ruangan.ruangan')->with('sukses', 'Ruangan berhasil dibuat');
    }
    public function edit($id)
    {
        $title ='Ruangan';
        $data = Ruangan::findOrFail($id);
        return view ('ruangan.edit',compact('title'),['Ruangan' => $data]);    
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'rng_namaruangan' => 'required|string|max:255',
        ], [
            'rng_namaruangan.required' => 'The Name field is required.',
        ]);

        $data = Ruangan::findOrFail($id);

        $data->update($validateData);

        return redirect()->route('ruangan.ruangan')->with('sukses', 'Ruangan Berhasil Diubah');
    }

    
}