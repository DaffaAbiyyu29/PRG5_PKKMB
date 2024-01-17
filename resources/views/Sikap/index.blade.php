<div class="row">
    <div class="col-lg">
        <div class="my-3" style="margin-top: 40px;">
            <a href="{{ route('sikap.create') }}" class="btn" style="background-color:#0059ab; color:white;">Tambah Data</a>
        </div>
    </div>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-lg">
        <div class="card">
            <h5 class="card-header white-text py-4 mb-4" style="background-color: #0059AB;">
                <strong>Nilai Sikap</strong>
            </h5>
            <div class="card-body pt-1 scrollable-table">
                <table class="table table-hover table-sm" style="width:100%; border: 2px solid #dee2e6; border-radius: 10px; overflow: hidden;" id="tabellist">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="nama">Nama </th>
                            <th scope="col" class="kelompok">Kelompok</th>
                            <th scope="col">Hari / Tanggal</th>
                            <th scope="col">Nilai</th>
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
