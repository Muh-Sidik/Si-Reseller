<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_barang'   => "required",
            'harga_barang'  => "required|numeric",
            'jumlah_barang' => "required|numeric",
            'id_supplier'   => "required",
            'id_kategori'   => "required",
        ]);

        $query = Barang::create([
            'nama_barang'   => $request->nama_barang,
            'harga_barang'  => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'id_supplier'   => $request->id_supplier,
            'id_kategori'   =>  $request->id_kategori,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Barang Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Barang Gagal ditambah!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_barang'   => "required",
            'harga_barang'  => "required|numeric",
            'jumlah_barang' => "required|numeric",
            'id_supplier'   => "required",
            'id_kategori'   => "required",
        ]);

        $query = Barang::find($id)->pdate([
            'nama_barang'   => $request->nama_barang,
            'harga_barang'  => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'id_supplier'   => $request->id_supplier,
            'id_kategori'   =>  $request->id_kategori,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Barang Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Barang Gagal diubah!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $query = Barang::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Nama Barang Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Barang Gagal dihapus!");
            return redirect()->back();
        }
    }
}
