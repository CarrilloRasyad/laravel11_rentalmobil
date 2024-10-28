<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h6 class="mb-4">Data Transaksi</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            {{-- <th scope="col">No.Polisi</th> --}}
                            {{-- <th scope="col">Merk</th> --}}
                            <th scope="col">Nama pemesan</th>
                            <th scope="col">No. Ponsel</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Pesanan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Status</th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $data)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            {{-- <td>{{$data->mobil->nopolisi}}</td> --}}
                            {{-- <td>{{$data->mobil->merk}}</td> --}}
                            <td>{{$data->nama}}</td>
                            <td>{{$data->ponsel}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->tgl_pesanan}}</td>
                            <td>{{$data->total}}</td>
                            <td>{{$data->waktu}} hari</td>
                            <td><card class="btn btn-sm btn-primary">{{$data->status}}</card></td>
                            <td>
                                @if ($data->status == 'WAIT')
                                    <button class="btn btn-success" wire:click="proses({{ $data->id }})">PROSES</button>
                                @endif 
                                @if ($data->status == 'PROSES')
                                <button class="btn btn-success" wire:click="selesai({{ $data->id }})">SELESAI</button>
                                @endif   
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Data Mobil Belum Tersedia!</td>
                        </tr> 
                        @endforelse
                    </tbody>
                </table>
                {{$transaksi->links()}}
            </div>
        </div>
    </div>
</div>   
