<!-- resources/views/jadwal/index.blade.php -->
@extends('layouts.layout')
@section('konten')
<div class="row">
    <div class="col-lg">
        <div class="my-3" style="margin-top: 40px;">
            <a class="btn" style="background-color:#0059ab; color:white;" href="{{ route('jadwal.create') }}">Tambah Data</a>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-lg-4 float-end mb-3">
            <div class="form-floating">
                <select class="form-select" id="hari" name="hari" aria-label="">
                    <option selected disabled>Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Semua">Semua Hari</option>
                </select>
                <label for="hari">Hari</label>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</div>
<div class="col-lg mb-4">
    <div class="card">
        <div class="card-header">
            Jadwal
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>																												
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>    
                    @php
                        $nomor = 1; // Inisialisasi nomor
                    @endphp
                    @forelse ($jadwal as $item)
                        <tr class="{{ strtolower($item['hari']) }}">
                            <td>{{$nomor++}}</td>
                            <td>{{$item['jdl_tglpelaksanaan']}}</td>
                            <td>{{$item['jdl_waktupelaksanaan']}}</td>
                            <td>{{$item['jdl_agenda']}}</td>
                            <td>{{$item['jdl_tempat']}}</td>
                            <td>
                                <a href="{{ route('jadwal.edit', ['id' => $item->jdl_idjadwal]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
