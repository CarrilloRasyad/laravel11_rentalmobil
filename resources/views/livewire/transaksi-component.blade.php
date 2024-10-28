<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <h6 class="mb-4">Pesan Mobil</h6>
                <div class="row">
                    @foreach ($mobil as $data)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{asset('storage/mobil/'. $data->foto)}}" style="height:200px; width:308px" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{$data->merk}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><i class="fas fa-solid fa-car"></i> {{$data->jenis}} </li>
                              <li class="list-group-item"><i class="fas fa-solid fa-user"></i> {{$data->kapasitas}} Orang</li>
                              <li class="list-group-item"><i class="fas fa-solid fa-tag"> Rp </i> {{$data->harga}}</li>
                            </ul>
                            <div class="card-body">
                              <button wire:click="create({{$data->id}}, {{$data->harga}})" class="btn btn-outline-success card-link">Pesan</button>
                              <a href="#" class="card-link"></a>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
                {{$mobil->links()}}
                {{-- <button class="btn btn-primary" wire:click="lihat" >Lihat Pesanan</button> --}}
                {{-- <button wire:click="create" class="mt-4 btn btn-primary">Tambah Transaksi</button> --}}
            </div>
        </div>
    </div>
    @if ($addPage == true)
        @include('transaksi.create')
    @endif
</div>   
