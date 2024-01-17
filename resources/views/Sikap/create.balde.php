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
				<strong>Tambah Nilai Sikap</strong>
			</h5>
			<div class="card-body px-lg-5 pt-0">
            <form method="POST" action="{{ route('ruangan.store') }}">
                    @csrf
				<div class="row">
					<div class="col-md-6">
						<!-- First Column -->
						<div class="input-group has-validation mb-4 nama">
							<div class="form-floating is-invalid">
								<select class="form-control is-invalid" id="nama" name="nama" data-target="validateField" value="{{ old('nls_nopendaftaran') }}" required>
									<option selected disabled>Pilih Mahasiswa</option>
								</select>
								<label for="nama">Mahasiswa</label>
								<div class="invalid-feedback" data-target="validateLabel">* Pilih Mahasiswa.</div>
							</div>
						</div>
						<div class="input-group has-validation mb-4 namakelompok">
						<div class="form-floating is-invalid">
							<input type="text" class="form-control" maxlengt h="100" id="kmk_namakelompok" name="kmk_namakelompok" data-target="validateField" style="background-color: transparent;" placeholder="" readonly
								@if(old('mhs_nopendaftaran'))
									value="{{ $mahasiswa->where('mhs_nopendaftaran', old('mhs_nopendaftaran'))->first()->kelompok->kmk_namakelompok }}"
								@endif>
							<label for="kmk_namakelompok">Kelompok</label>
							<div class="invalid-feedback" data-target="validateLabel">* Masukkan Nama Kelompok.</div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- Second Column  -->
						<div class="input-group has-validation mb-4 tanggal">
							<div class="form-floating">
								<input type="datetime-local" class="form-control" id="tanggal" name="tanggal" data-target="validateField" style="background-color: transparent;" placeholder="" readonly>
								<label for="validateField">Hari / Tanggal</label>
							</div>
						</div>
						<div class="input-group has-validation mb-4 nilaisikap">
							<div class="form-floating is-invalid">
								<select class="form-select is-invalid" id="nilaisikap" name="nilaisikap" data-target="validateField" aria-label="">
									<option selected disabled>Pilih Kategori Nilai</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
								</select>
								<label for="floatingSelect">Kategori Nilai</label>
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Kategori Nilai.</div>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-rounded btn-block my-4 white-text font-weight-bold waves-effect z-depth-0" Style="background-color: #0059AB;" onclick="tambahnilaisikap(event)">Simpan</button>
			</div>
		</div>
	</div>
</div>
