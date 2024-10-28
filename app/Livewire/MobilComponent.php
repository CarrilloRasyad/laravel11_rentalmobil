<?php

namespace App\Livewire;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage,$editPage = false;
    public $nopolisi,$merk,$jenis,$kapasitas,$harga,$foto, $id;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        return view('livewire.mobil-component', $data);
    }
    public function create() 
    {
        $this->addPage = true;
    }
    public function store() 
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ],[
            'nopolisi.required' => 'No.Polisi Wajib Di isi',
            'merk.required' => 'Merk mobil Wajib Di isi',
            'jenis.required' => 'Jenis mobil Wajib Di pilih',
            'kapasitas.required' => 'Kapasitas mobil Wajib Di isi',
            'harga.required' => 'Harga mobil Wajib Di isi',
            'foto.required' => 'Upload foto mobil tidak boleh kosong',
            'foto.image' => 'Foto harus format image'
        ]);


        $this->foto->storeAs('public/mobil',$this->foto->hashName());
        Mobil::create([
            'user_id' => Auth::user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName()
        ]);

        session()->flash('success', 'Berhasil menambahkan data mobil');
        $this->reset();
    }
    // public function destroy($id) 
    // {
    //     $mobil = Mobil::find($id);
    //     unlink(public_path('storage/mobil/'. $mobil->foto));
    //     $mobil->delete();
    //     session()->flash('success', 'Berhasil menghapus data mobil');
    //     $this->reset();
    // }

    public function destroy(Request $request, $id) 
    {
        // Cari data mobil berdasarkan ID
        $mobil = Mobil::find($id);

        // Buat path lengkap ke file yang akan dihapus
        $filePath = public_path('storage/mobil/' . $mobil->foto);

        // Cek apakah file tersebut ada
        if (file_exists($filePath)) {
            // Jika ada, hapus file tersebut
            unlink($filePath);
        } else {
            // Jika tidak ada, log atau tampilkan pesan kesalahan
            logger("File tidak ditemukan: " . $filePath);
            session()->flash('error', 'File tidak ditemukan, mungkin sudah dihapus sebelumnya.');
        }

        $mobil->delete();

        // Hapus data mobil dari database
        Mobil::where('id', $request->id)->delete();

        // Tampilkan pesan sukses
        session()->flash('success', 'Berhasil menghapus data mobil');

        // Reset form atau state jika diperlukan
        $this->reset();
    }

    public function edit($id)
    {
        $this->reset();
        $mobil = Mobil::find($id);
        $this->id = $id;
        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->kapasitas = $mobil->kapasitas;
        $this->harga = $mobil->harga;
        // $this->foto = $mobil->foto;
        $this->editPage = true;
    }
    public function update()
    {
        $mobil = Mobil::find($this->id);
        if(empty($this->foto)) {
            $mobil->update([
                'user_id' => Auth::user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga
            ]); 
        } else {
            unlink(public_path('storage/mobil/'. $mobil->foto));
            $this->foto->storeAs('public/mobil', $this->foto->hashName());
            $mobil->update([
                'user_id' => Auth::user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga,
                'foto' => $this->foto->hashName()
            ]);
        }
        session()->flash('success', 'Data berhasil di update');
        $this->reset();
    }
}
