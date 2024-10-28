<?php

namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage,$lihatPage = false;
    public $nama, $ponsel, $alamat, $waktu, $tgl_pesanan, $mobil_id, $harga, $total; // $mobil, $id
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        return view('livewire.transaksi-component', $data);
    }

    public function hitung() 
    {
        $waktu = $this->waktu;
        $harga = $this->harga;
        $this->total = $waktu * $harga;
    }

    public function create($id, $harga)
    {
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }
    public function store() 
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'waktu' => 'required',
            'tgl_pesanan' => 'required'
        ],[
            'nama.required' => 'Nama Pemesan wajib di isi',
            'ponsel.required' => 'Nomor Ponsel wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
            'waktu.required' => 'Waktu sewa wajib di isi',
            'tgl_pesanan.required' => 'Pilih tanggal pesanan dan wajib di isi'
        ]);

        $cari = Transaksi::where('mobil_id', $this->mobil_id)
                ->where('tgl_pesanan', $this->tgl_pesanan)
                ->where('status','!=','SELESAI')->count();

        if ($cari == 1) {
            session()->flash('error', 'Mobil sudah ada yang memesan, silahkan pilih mobil/tanggal yang lain');
        } else {
            Transaksi::create([
                'user_id' => Auth::user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'waktu' => $this->waktu,
                'tgl_pesanan' => $this->tgl_pesanan,
                'total' => $this->total,
                'status' => 'WAIT'
            ]);
            session()->flash('success', 'Transaksi berhasil disimpan');
        }
        $this->dispatch('lihat-transaksi');

        // fungsi nya untuk mengkosongkan form yang telah di submit
        $this->reset();
    }

    public function update($id) 
    {
        $transaksi = Transaksi::find($id);
    }

    public function lihat() 
    {
        // $this->lihatPage = true;
        $data['transaksi'] = Transaksi::paginate(10);
        // return view('transaksi.lihat', $data);
    }
}
