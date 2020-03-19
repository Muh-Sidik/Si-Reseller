<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => "required",
        ]);

        $query = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Kategori Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Kategori Gagal ditambah!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kategori' => "required",
        ]);

        $query = Kategori::find($id)->pdate([
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Kategori Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Kategori Gagal diubah!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $query = Kategori::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Nama Kategori Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Kategori Gagal dihapus!");
            return redirect()->back();
        }
    }
}
