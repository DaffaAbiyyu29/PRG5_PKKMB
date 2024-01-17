<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiSikap;
use App\Models\Panitia;
use App\Models\Sikap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='NilaiSikap';
        $data = Sikap::all();
        return view ('Sikap.index',compact('title'),['sikap' => $data],);
    }
    public function TambahSikap()
    {
        $panitiaOptions = $this->getMhsOptions();
        return view('Sikap.create', compact('mhsOptions'));
    }
    public function getMhsOptions()
    {
        $mhsOptions = Panitia::pluck('mhs_nopendaftaran', 'mhs_nama')->toArray();
        return $mhsOptions;
    }  
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nls_nopendaftaran' => 'required|string|max:255',
            'nls_nim' => 'required|string|max:255',
            'nls_sikap' => 'required',
            'nls_tanggal' => 'required',
            'nls_status' => 'required',
        ], [
        'nls_nopendaftaran.required' => 'The No Pendaftaran field is required.',
        'nls_nim.required' => 'The NIM field is required.',
        'nls_sikap.required' => 'The Sikap Studi field is required.', 
        'nls_tanggal.required' => 'The Tanggal field is required.',
        'nls_status.required' => 'The Status field is required.',
        ],);
        $validateData['nls_status'] = 'aktif'; // Set 'tmp_status' here
       
        Sikap::create($validateData);
    
        return redirect()->route('nilaisikap.nilaisikap')->with('sukses', 'nilaisikap berhasil dibuat');
    }
    public function edit($id)
    {
        $title ='NilaiSikap';
        $data = Sikap::findOrFail($id);
        return view ('NilaiSikap.edit',compact('title'),['sikap' => $data]);    
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nls_nopendaftaran' => 'required|string|max:255',
            'nls_nim' => 'required|string|max:255',
            'nls_sikap' => 'required',
            'nls_tanggal' => 'required',
            'nls_status' => 'required',
        ], [
         'nls_nopendaftaran.required' => 'The No Pendaftaran field is required.',
        'nls_nim.required' => 'The NIM field is required.',
        'nls_sikap.required' => 'The Sikap Studi field is required.',
        'nls_tanggal.required' => 'The Tanggal field is required.',
        'nls_status.required' => 'The Status field is required.',
        ],);
        $validateData['nls_status'] = 'aktif'; // Set 'tmp_status' here
        
        $data = Sikap::findOrFail($id);

        $data->update($validateData);

        return redirect()->route('sikap.sikap')->with('sukses', 'nilai sikap Berhasil Diubah');
    }
}