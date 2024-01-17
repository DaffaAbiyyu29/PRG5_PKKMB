<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Ruangan;
use App\Models\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='Kelompok';
        $data = Kelompok::all();
        return view ('Kelompok.index',compact('title'),['kelompok' => $data],);
    }
    public function TambahKelompok()
    {
        $ruanganOption = $this->getRuanganOptions();
        $panitiaOption = $this->getPanitiaOptions();
        return view('kelompok.create', compact('ruanganOption','panitiaOption'));
    }
    public function getRuanganOptions()
    {
        $ruanganOption = Ruangan::pluck('rng_namaruangan', 'rng_idruangan')->toArray();
        return $ruanganOption;
    }
    public function getPanitiaOptions()
    {
        $panitiaOptions = Panitia::pluck('ksk_nama', 'ksk_nim')->toArray();
        return $panitiaOptions;
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kmk_namakelompok' => 'required|string|max:255',
            'kmk_nim' => 'required|string|max:255',
            'kmk_idruangan' => 'required',
        ], [
            'kmk_namakelompok.required' => 'The Nama Lengkap field is required.',
            'kmk_nim.required' => 'The Nim field is required.',
            'kmk_idruangan.required' => 'The Ruangan field is required.',
        ],);
        $validateData['kmk_status'] = 'aktif'; // Set 'tmp_status' here
       
        Kelompok::create($validateData);
    
        return redirect()->route('kelompok.kelompok')->with('sukses', 'kelompok berhasil dibuat');
    }
    public function edit($id)
    {
        $title ='Kelompok';
        $data = Kelompok::findOrFail($id);
        return view ('Kelompok.edit',compact('title'),['Kelompok' => $data]);    
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kmk_namakelompok' => 'required|string|max:255',
            'kmk_nim' => 'required|string|max:255',
            'kmk_idruangan' => 'required',
        ], [
            'kmk_namakelompok.required' => 'The Nama Lengkap field is required.',
            'kmk_nim.required' => 'The Gender field is required.',
            'kmk_idruangan.required' => 'The Program Studi field is required.',
            'kmk_status.required' => 'The Status field is required.',
        ],);
        $validateData['kmk_status'] = 'aktif'; // Set 'tmp_status' here

        $data = Kelompok::findOrFail($id);

        $data->update($validateData);

        return redirect()->route('kelompok.kelompok')->with('sukses', 'kelompok Berhasil Diubah');
    }
}