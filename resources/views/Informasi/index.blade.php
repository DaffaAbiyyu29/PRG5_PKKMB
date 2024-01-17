@extends('layouts.layout')

@section('konten')
<div class="card m-5">
    <div class="card-header mb-1 text-center">
        <h4 class="font-weight-bold text-primary">Informasi Mahasiswa</h4>
    </div>
    <div class="card-body">
        <div class="overflow-auto">
            <div class="card-deck">
                @forelse ($informasi as $item)
                    <div class="card">
                        <div class="card-header">Informasi</div>
                        <div class="card-body">
                            <h5 class="card-title text-info">{{ $item['inf_namainformasi'] }}</h5>
                            <p class="card-text">
                                Jenis Informasi: {{ $item['inf_jenisinformasi'] }}<br>
                                Tanggal Publikasi: {{ \Carbon\Carbon::parse($item['inf_tglpublikasi'])->format('d-m-Y') }}<br>
                                Deskripsi: {{ $item['inf_deskripsi'] }}<br>
                            </p>
                            <div class="d-flex justify-content-end">
                            <a href="{{ route('informasi.edit', ['id' => $item->inf_idinformasi]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Tidak ada data yang tersedia.</p>
                @endforelse
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <a class="btn" style="background-color:#0059ab; color:white;" href="{{ route('informasi.create') }}">Tambah Data</a>
            </div>
        </div>
    </div>
</div>
@endsection
