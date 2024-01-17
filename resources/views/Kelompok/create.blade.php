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
                    <strong>Tambah Kelompok</strong>
                </h5>
                <form method="POST" action="{{ route('kelompok.store') }}">
                    @csrf
                    <div class="card-body px-lg-5 pt-1">
                        <div class="row">
                            <div class="col-md">
                                <!-- First Column -->
                                <div class="input-group has-validation mb-4 namakelompok">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="kmk_namakelompok" name="kmk_namakelompok" data-target="validateField" value="{{ old('kmk_namakelompok') }}" placeholder="">
                                        <label for="kmk_namakelompok">Nama Kelompok</label>
                                        @error('kmk_namakelompok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group has-validation mb-4 kmk_idruangan">
                                    <div class="form-floating">
                                        <select class="form-select" id="kmk_idruangan" data-target="validateField" name="kmk_idruangan" aria-label="">
                                            <option value="" selected disabled>Pilih Ruangan</option>
                                            @foreach($ruanganOption as $idRuangan => $namaRuangan)
                                                <option value="{{ $idRuangan }}" {{ old('kmk_idruangan') == $idRuangan ? 'selected' : '' }}>{{ $namaRuangan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="kmk_idruangan">Ruangan</label>
                                    </div>
                                </div>
                                <div class="input-group has-validation mb-4 kmk_nim">
                                    <div class="form-floating">
                                        <select class="form-select" id="kmk_nim" data-target="validateField" name="kmk_nim" aria-label="">
                                            <option value="" selected disabled>Pilih Fasilitator</option>
                                            @foreach($panitiaOption as $nimFasilitator => $namaFasilitator)
                                                <option value="{{ $nimFasilitator }}" {{ old('kmk_nim') == $nimFasilitator ? 'selected' : '' }}>{{ $namaFasilitator }}</option>
                                            @endforeach
                                        </select>
                                        <label for="kmk_nim">Fasilitator</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="btnTambahKelompok" class="btn btn-rounded btn-block my-3 mb-4 white-text font-weight-bold waves-effect z-depth-0" Style="background-color: #0059AB;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('btnTambahKelompok').addEventListener('click', function(event) {
            event.preventDefault();

            var kmk_namakelompok = document.getElementById("kmk_namakelompok").value;
            var kmk_nim = document.getElementById("kmk_nim").value;
            var kmk_idruangan = document.getElementById("kmk_idruangan").value;

            if (kmk_namakelompok.trim() === '' || kmk_idruangan.trim() === '' || kmk_nim.trim() === '') {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Lengkapi Semua Fields",
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }

            var url = "{{ route('kelompok.store') }}"; // Adjust the endpoint
            var method = "POST";
            var data = {
                kmk_idkelompok: "",
                kmk_namakelompok: kmk_namakelompok,
                kmk_nim: kmk_nim,
                kmk_idruangan: kmk_idruangan,
                kmk_status: "Aktif"
            };

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function (data) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data Kelompok Berhasil Disimpan",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = '{{ route("kelompok.kelompok") }}';
                    });
                },
                error: function (xhr, status) {
                    console.error("AJAX request error:", status);
                    console.log("Server response:", xhr.responseJSON);
                },
            });
        });
    });
</script>
@endpush
