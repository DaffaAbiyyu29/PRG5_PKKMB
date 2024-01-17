<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Panitia;
use App\Models\Tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $title ='Jadwal';
        $data = Jadwal::all();
        return view ('Jadwal.index',compact('title'),['jadwal' => $data],);
    }
    public function TambahJadwal()
    {
        $panitiaOptions = $this->getPanitiaOptions();
        return view('Jadwal.create', compact('panitiaOptions'));
    }
    public function getPanitiaOptions()
    {
        $panitiaOptions = Panitia::pluck('ksk_nama', 'ksk_nim')->toArray();
        return $panitiaOptions;
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jdl_nim' => 'required|string|max:255',
            'jdl_tglpelaksanaan' => 'required',
            'waktumulai' => 'required',
            'waktuakhir' => 'required',
            'jdl_agenda' => 'required',
            'jdl_tempat' => 'required',
        ], [
            'jdl_nim' => 'Pilih Nim',
            'jdl_tglpelaksanaan.required' => 'Masukkan Tanggal Kegiatan.',
            'waktumulai.required' => 'Masukkan Waktu Mulai Kegiatan.',
            'waktuakhir.required' => 'Masukkan Waktu Akhir Kegiatan.',
            'jdl_agenda.required' => 'Masukkan Kegiatan.',
            'jdl_tempat.required' => 'Pilih Tempat.', 
        ]);
    
        $validateData['jdl_status'] = 'aktif';
        $validateData['jdl_waktupelaksanaan'] = $validateData['waktumulai'] . ' - ' . $validateData['waktuakhir'];
    
        Jadwal::create($validateData);
    
        return redirect()->route('jadwal.jadwal')->with('sukses', 'Jadwal berhasil dibuat');
    }

    public function edit($id)
{
    $title = 'Ubah Jadwal';
    $jadwal = Jadwal::findOrFail($id);
    $panitiaOptions = $this->getPanitiaOptions();

    return view('Jadwal.edit', compact('title', 'jadwal', 'panitiaOptions'));
}

    
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jdl_nim' => 'required|string|max:255',
            'jdl_tglpelaksanaan' => 'required',
            'waktumulai' => 'required',
            'waktuakhir' => 'required',
            'jdl_agenda' => 'required',
            'jdl_tempat' => 'required',
        ], [
            'jdl_nim' => 'Pilih Nim',
            'jdl_tglpelaksanaan.required' => 'Masukkan Tanggal Kegiatan.',
            'waktumulai.required' => 'Masukkan Waktu Mulai Kegiatan.',
            'waktuakhir.required' => 'Masukkan Waktu Akhir Kegiatan.',
            'jdl_agenda.required' => 'Masukkan Kegiatan.',
            'jdl_tempat.required' => 'Masukkan Tempat.', 
        ]);
    
        $validateData['jdl_status'] = 'aktif';
        $validateData['jdl_waktupelaksanaan'] = $validateData['waktumulai'] . ' - ' . $validateData['waktuakhir'];
    
        Jadwal::findOrFail($id)->update($validateData);
    
        return redirect()->route('jadwal.jadwal')->with('sukses', 'Jadwal berhasil diperbarui');
    }
}