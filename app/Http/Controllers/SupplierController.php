<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_supplier' => "required",
            'alamat'        => "required",
            'no_hp'         => "required|numeric",
        ]);

        $query = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Supplier Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Supplier Gagal ditambah!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_supplier' => "required",
            'alamat'        => "required",
            'no_hp'         => "required|numeric",
        ]);

        $query = Supplier::find($id)->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Supplier Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Supplier Gagal diubah!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $query = Supplier::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Nama Supplier Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Supplier Gagal dihapus!");
            return redirect()->back();
        }
    }

}
