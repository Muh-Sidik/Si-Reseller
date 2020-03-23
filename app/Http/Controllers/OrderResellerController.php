<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Order_Reseller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderResellerController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'total_order'   => "required|numeric"
        ]);

        $input = $request->input('id_barang');
        $total_order = $request->input('total_order');
        $barang = Barang::find($input);

        Barang::find($input)->update([
            'jumlah_barang' => $barang->jumlah_barang -= $total_order,
        ]);

        $query = Order_Reseller::create([
            'id_reseller'   => $request->id_reseller,
            'id_barang'     => $input,
            'total_order'   => $total_order,
            'total_harga'   =>  $barang->harga_jual *= $total_order,
        ]);


        if ($query) {
            Alert::success("Berhasil!", "Alokasi Reseller Berhasil!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Alokasi Reseller Gagal!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $order = Order_Reseller::find($id);
        $total_order = $order->total_order;
        $barang = Barang::find($order->id_barang);

        Barang::find($order->id_barang)->update([
            'jumlah_barang' => $barang->jumlah_barang += $total_order,
        ]);
        $query = Order_Reseller::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Order Reseller Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Order Reseller Gagal dihapus!");
            return redirect()->back();
        }
    }
}
