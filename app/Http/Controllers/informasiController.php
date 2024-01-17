<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='Informasi';
        $data = Informasi::all();
        return view ('Informasi.index',compact('title'),['informasi' => $data],);
    }
    public function TambahInformasi()
    {
        $panitiaOptions = $this->getPanitiaOptions();
        return view('informasi.create', compact('panitiaOptions'));
    }
    public function getPanitiaOptions()
    {
        $panitiaOptions = Panitia::pluck('ksk_nama', 'ksk_nim')->toArray();
        return $panitiaOptions;
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'inf_nim' => 'required|string|max:255',
            'inf_jenisinformasi' => 'required|string|max:255',
            'inf_namainformasi' => 'required|string|max:255',
            'inf_tglpublikasi' => 'required',
            'inf_deskripsi' => 'required',
        ], [
            'inf_nim.required' => 'The Nim field is required.',
            'inf_jenisinformasi.required' => 'The Jenis field is required.',
            'inf_namainformasi' => 'The Jenis field is required.',
            'inf_tglpublikasi' => 'The Jenis field is required.',
            'inf_deskripsi' => 'The Jenis field is required.',
        ],);
        $validateData['inf_status'] = 'aktif'; // Set 'tmp_status' here
    
        Informasi::create($validateData);
    
        return redirect()->route('informasi.informasi')->with('sukses', 'Informasi berhasil dibuat');
    }
    public function edit($id)
    {
        $title ='Informasi';
        $data = Informasi::findOrFail($id);
        return view ('Informasi.edit',compact('title'),['Informasi' => $data]);    
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'inf_nim' => 'required|string|max:255',
            'inf_jenisinformasi' => 'required|string|max:255',
            'inf_namainformasi' => 'required|string|max:255',
            'inf_tglpublikasi' => 'required',
            'inf_deskripsi' => 'required',
        ], [
            'inf_nim.required' => 'The Nim field is required.',
            'inf_jenisinformasi.required' => 'The Jenis field is required.',
            'inf_namainformasi' => 'The Jenis field is required.',
            'inf_tglpublikasi' => 'The Jenis field is required.',
            'inf_deskripsi' => 'The Jenis field is required.',
        ],);
        $validateData['inf_status'] = 'aktif'; // Set 'tmp_status' here

        $data = Informasi::findOrFail($id);

        $data->update($validateData);

        return redirect()->route('informasi.informasi')->with('sukses', 'informasi Berhasil Diubah');
    }
}