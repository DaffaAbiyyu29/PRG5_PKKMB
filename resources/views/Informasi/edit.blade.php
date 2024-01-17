@extends('layouts.layout')
@section('konten')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row justify-content-center mb-5">
    <div class="col-lg mb-4">
        <p>
            <h2 class="text-center"><span style="color:#0059ab;">Kesekretariatan</span> / Informasi / </h2>
        </p>
    </div>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-lg-8">
        <div class="card">
            <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                <strong>Ubah Informasi</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
            <form method="POST" action="{{ route('informasi.update',$Informasi->inf_idinformasi) }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <!-- First Column -->
                        <div class="form-floating mb-4 inf_nim">
                            <input type="text" class="form-control" id="inf_nim" name="inf_nim" value="{{ old('inf_nim',$Informasi->inf_nim) }}" placeholder="">
                            <label for="inf_nim">Nim</label>
                            @error('inf_nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4 inf_jenisinformasi">
                            <input type="text" class="form-control" id="inf_jenisinformasi" name="inf_jenisinformasi" value="{{ old('inf_jenisinformasi',$Informasi->inf_jenisinformasi) }}" placeholder="">
                            <label for="inf_jenisinformasi">Jenis Informasi</label>
                            @error('inf_jenisinformasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4 inf_namainformasi">
                            <input type="text" class="form-control" id="inf_namainformasi" name="inf_namainformasi" value="{{ old('inf_namainformasi',$Informasi->inf_namainformasi) }}" placeholder="">
                            <label for="inf_namainformasi">Nama Informasi</label>
                            @error('inf_namainformasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Second Column -->
                        <div class="form-floating mb-4 inf_tglpublikasi">
                            <input type="date" class="form-control" id="inf_tglpublikasi" name="inf_tglpublikasi" value="{{ old('inf_tglpublikasi',$Informasi->inf_tglpublikasi) }}" placeholder="">
                            <label for="inf_tglpublikasi">Tanggal Publikasi</label>
                            @error('inf_tglpublikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4 inf_deskripsi">
                            <input type="text" class="form-control" id="inf_deskripsi" name="inf_deskripsi" value="{{ old('inf_deskripsi',$Informasi->inf_deskripsi) }}" placeholder="">
                            <label for="inf_deskripsi">Deskripsi</label>
                            @error('inf_deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-rounded btn-block my-3 mb-4 white-text font-weight-bold waves-effect z-depth-0" style="background-color: #0059AB;">
                        Simpan
                    </button>
            </div>
        </div>
    </div>
</div>
@endsection