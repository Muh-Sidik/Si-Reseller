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
            'id_supplier'   => "required",
            'id_kategori'   => "required",
            'harga_jual'    => "required|numeric",
        ]);

        $query = Barang::create([
            'nama_barang'   => $request->nama_barang,
            'harga_barang'  => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_jual'    => $request->harga_jual,
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
            'id_supplier'   => "required",
            'id_kategori'   => "required",
            'harga_jual'    => "required|numeric",
        ]);

        $query = Barang::find($id)->update([
            'nama_barang'   => $request->nama_barang,
            'harga_barang'  => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_jual'    => $request->harga_jual,
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


        $input = $request->input('total_order');
        $find = Barang::find($id_barang);

        $query = Order_Supplier::create([
            'id_barang' => $request->id_barang,
            'id_supplier' => $request->id_supplier,
            'id_kategori' => $request->id_kategori,
            'total_order' => $input,
            'total_harga' => $find->harga_barang *= $input,
        ]);

        $item = Barang::find($id_barang);
        $barang = Barang::find($id_barang)->update([
            'jumlah_barang' => $item->jumlah_barang += $input,
        ]);


        if ($query && $barang){
            Alert::success("Berhasil", "Stock ". $item->nama_barang ." ditambah ". $input);
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Stock Barang Gagal ditambah!");
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
