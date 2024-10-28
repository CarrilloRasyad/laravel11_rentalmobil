<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Mobil</h6>
            <form>
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" wire:model="nama" id="nama" value="{{@old('nama')}}">
                    @error('nama')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ponsel" class="form-label">No.Telp</label>
                    <input type="text" class="form-control" wire:model="ponsel" id="ponsel" value="{{@old('ponsel')}}">
                    @error('ponsel')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" wire:model="alamat" id="alamat" value="{{@old('alamat')}}">
                    @error('alamat')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" class="form-control" wire:model="waktu" id="waktu" value="{{@old('waktu')}}">
                    @error('waktu')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" class="form-control" wire:model="total" id="total" value="{{@old('total')}}">
                    @error('total')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Transaksi</label>
                    <select id="status" class="form-select" wire:model="status">
                        <option value="">--Pilih--</option>
                        <option value="WAIT">Wait</option>
                        <option value="PROSES">Proses</option>
                        <option value="SELESAI">Selesai</option>
                    </select>
                    @error('status')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="button" wire:click="update" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>



