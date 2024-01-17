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
				<strong>Tambah Jadwal</strong>
				<a class="btn" style="position: absolute; top: 11px; right: 10px; color: white;" asp-controller="akun" asp-action="login"><strong>X</strong></a>
			</h5>
			<div class="card-body px-lg-5 pt-1">
            <form method="POST" action="{{ route('jadwal.store') }}">
                @csrf
				<div class="row">
					<div class="col-md-6">
                        <!-- First Column -->
                        <div class="form-floating mb-4 nim">
                        <select class="form-select" id="jdl_nim" name="jdl_nim">
                            <option value="" selected disabled>Pilih Panitia</option>
                            @foreach($panitiaOptions as $nim => $namaPanitia)
                                <option value="{{ $nim }}" {{ old('jdl_nim') == $nim ? 'selected' : '' }}>{{ $namaPanitia }}</option>
                            @endforeach
                        </select>
                        <label for="inf_nim">Panitia Kesekretariatan</label>
                        @error('jdl_nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
						<div class="input-group has-validation mb-4 tanggal">
							<div class="form-floating is-invalid">
								<input type="date" class="form-control" id="jdl_tglpelaksanaan" name="jdl_tglpelaksanaan" data-target="validateField" placeholder="">
								<label for="validateField">Tanggal Kegiatan</label>
                                @error('jdl_tglpelaksanaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Tanggal Kegiatan.</div>
							</div>
						</div>
						<div class="input-group has-validation mb-4 waktumulai">
							<div class="form-floating is-invalid">
								<input type="time" class="form-control" id="waktumulai" name="waktumulai" data-target="validateField" placeholder="">
								<label for="validateField">Waktu Mulai</label>
                                @error('waktumulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Waktu Mulainya Kegiatan.</div>
							</div>
						</div>
						<div class="input-group has-validation mb-4 waktuakhir">
							<div class="form-floating is-invalid">
								<input type="time" class="form-control" id="waktuakhir" name="waktuakhir" data-target="validateField" placeholder="">
								<label for="validateField">Waktu Berakhir</label>
                                @error('waktuakhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Waktu Berakhirnya Kegiatan.</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- Second Column -->
						
						<div class="input-group has-validation mb-4 kegiatan">
							<div class="form-floating is-invalid">
								<textarea class="form-control" placeholder="" id="jdl_agenda" data-target="validateField" name="jdl_agenda" style="height: 100px"></textarea>
								<label for="validateField">Kegiatan</label>
                                @error('jdl_agenda')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Kegiatan.</div>
							</div>
						</div>  
						<div class="input-group has-validation mb-4 jdl_tempat">
							<div class="form-floating is-invalid">
								<textarea class="form-control" placeholder="" id="jdl_tempat" data-target="validateField" name="jdl_tempat" style="height: 100px"></textarea>
								<label for="validateField">Tempat</label>
                                @error('jdl_tempat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
								<div class="invalid-feedback" data-target="validateLabel">* Masukkan Tempat.</div>
							</div>
						</div>  	
					</div>
				</div>
			</div>
			<button class="btn btn-rounded btn-block my-3 mb-4 white-text font-weight-bold waves-effect z-depth-0" Style="background-color: #0059AB;" onclick="tambahJadwal(event)">Simpan</button>
		</div>
	</div>
</div>
@endsection