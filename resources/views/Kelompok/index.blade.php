@extends('layouts.layout')
@section('konten')
<div class="row">
    <div class="col-lg">
        <div class="my-3" style="margin-top: 40px;">
            <a class="btn" style="background-color:#0059ab; color:white;" href="{{ route('kelompok.create') }}">Tambah Data</a>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-lg mb-4">
        <div class="card">
            <div class="card-header">
                Kelompok
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelompok</th>
                            <th scope="col">Fasilitator</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @php
                            $nomor = 1; // Inisialisasi nomor
                        @endphp
                        @forelse ($kelompok as $item)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>{{$item['kmk_namakelompok']}}</td>
                                <td>{{$item['kmk_nim']}}</td>
                                <td>
                                    <a href="{{ route('kelompok.edit', ['id' => $item->kmk_idkelompok]) }}" class="btn btn-sm btn-primary">
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
