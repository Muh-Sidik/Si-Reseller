<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Order_Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
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

        $query = Kategori::find($id)->update([
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
        $query = Order_Supplier::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Nama Kategori Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Kategori Gagal dihapus!");
            return redirect()->back();
        }
    }

    public function delete($id) {

        $order = Order_Supplier::find($id);
        $total_order = $order->total_order;
        $barang = Barang::find($order->id_barang);

        Barang::find($order->id_barang)->update([
            'jumlah_barang' => $barang->jumlah_barang -= $total_order,
        ]);
        $query = Order_Supplier::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Riwayat Order Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Riwayat Order Gagal dihapus!");
            return redirect()->back();
        }
    }
}
