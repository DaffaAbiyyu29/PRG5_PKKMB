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
    <div class="col-lg-8">
        <div class="card">
            <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                <strong>Ubah Ruangan</strong>
                <a class="btn" style="position: absolute; top: 11px; right: 10px; color: white;" href=""><strong>X</strong></a>
            </h5>
            <div class="card-body px-lg-5 pt-1">
            <form method="POST" action="{{ route('ruangan.update',$Ruangan->rng_idruangan) }}">
                    @csrf
                    <div class="input-group has-validation mb-4 rng_namaruangan">
                        <div class="form-floating @error('rng_namaruangan') is-invalid @enderror">
                            <input type="text" class="form-control" maxlength="30" id="rng_namaruangan" name="rng_namaruangan" value="{{ old('rng_namaruangan',$Ruangan->rng_namaruangan) }}" placeholder="">
                            <label for="rng_namaruangan">Ruangan</label>
                            @error('rng_namaruangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-block my-3 mb-4 white-text font-weight-bold waves-effect z-depth-0" style="background-color: #0059AB;">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
