@extends('layouts.layout')
@section('konten')
<div class="row">
    <div class="col-lg">
        <div class="my-3" style="margin-top: 40px;">
            <a class="btn" style="background-color:#0059ab; color:white;" href="{{ route('ruangan.create') }}">Tambah Data</a>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-lg mb-4">
        <div class="card">
            <div class="card-header">
                Ruangan
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">ID Ruangan</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @php
                            $nomor = 1; // Inisialisasi nomor
                        @endphp
                        @forelse ($ruangan as $item)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>{{$item['rng_namaruangan']}}</td>
                                <td>{{$item['rng_status']}}</td>
                                <td>
                                    <a href="{{ route('ruangan.edit', ['id' => $item->rng_idruangan]) }}" class="btn btn-sm btn-primary">
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
