<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Order_Supplier;
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
            Alert::success("Berhasil!", "Data Barang Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Barang Gagal ditambah!");
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

        $query = Barang::find($id)->update([
            'nama_barang'   => $request->nama_barang,
            'harga_barang'  => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'id_supplier'   => $request->id_supplier,
            'id_kategori'   =>  $request->id_kategori,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Data Barang Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Barang Gagal diubah!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $query = Barang::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Data Barang Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Barang Gagal dihapus!");
            return redirect()->back();
        }
    }

    public function stock(Request $request,$id_barang)
    {
        $validate = $request->validate([
            'total_order'   => 'required',
        ]);

        $input = $request->input('total_order');
        $find = Barang::find($id_barang);
        $total = $find->harga_barang *= $input;

        $query = Order_Supplier::create([
            'id_barang' => $request->id_barang,
            'id_supplier' => $request->id_supplier,
            'id_kategori' => $request->id_kategori,
            'total_order' => $input,
            'total_harga' => $total,
        ]);

        $barang = Barang::find($id_barang);
        $barang->jumlah_barang += $input;


        if ($barang->save() && $query){
            Alert::success("Berhasil", "Stock ". $barang->nama_barang ." ditambah ". $input);
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Stock Barang Gagal ditambah!");
            return redirect()->back();
        }
    }
}
