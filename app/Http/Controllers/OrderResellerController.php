<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangReseller;
use App\Order_Reseller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderResellerController extends Controller
{
    public function store(Request $request)
    {


        // $validate = $request->validate([
        //     'total_order'   => "required|numeric",
        //     'harga_jual'    => "required",
        //     'id_barang'     => "required",
        // ]);

        $input = $request->input('id_barang');
        $total_order = $request->input('total_order');
        $barang = Barang::find($input);

        Barang::find($input)->update([
            'jumlah_barang' => $barang->jumlah_barang -= $total_order,
        ]);

        $barang->harga_barang * $total_order;
        $barang->harga_jual * $total_order;

        $query = Order_Reseller::create([
            'id_reseller'   => $request->id_reseller,
            'id_barang'     => $input,
            'total_order'   => $total_order,
            'total_harga'   => $barang->harga_jual,
            'keuntungan'    => $barang->harga_jual -= $barang->harga_beli,
        ]);

        $item = Barang::find($input);

        $reseller = BarangReseller::create([
            'id_reseller'       => $request->id_reseller,
            'nama_barang'       => $item->nama_barang,
            'stock_barang'      => $total_order,
            'id_kategori'       => $item->id_kategori,
            'harga_beli'        => $item->harga_jual,
            'total_beli'        => $item->harga_jual *= $total_order,
        ]);


        if ($query && $reseller) {
            Alert::success("Berhasil!", "Order Reseller Berhasil!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Order Reseller Gagal!");
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

    public function order(Request $request)
    {



        $input = $request->input('id_barang');
        $total_order = $request->input('total_order');
        $barang = Barang::find($input);

        Barang::find($input)->update([
            'jumlah_barang' => $barang->jumlah_barang -= $total_order,
        ]);

        $modal = $barang->harga_barang * $total_order;
        $jual = $barang->harga_jual * $total_order;

        $query = Order_Reseller::create([
            'id_reseller'   => $request->id_reseller,
            'id_barang'     => $input,
            'total_order'   => $total_order,
            'total_harga'   => $barang->harga_jual,
            'keuntungan'    => $jual - $modal,
        ]);

        $item = Barang::find($input);

        $reseller = BarangReseller::create([
            'id_reseller'       => $request->id_reseller,
            'nama_barang'       => $item->nama_barang,
            'stock_barang'      => $total_order,
            'id_kategori'       => $item->id_kategori,
            'harga_beli'        => $item->harga_jual,
            'harga_jual'        => $request->harga,
            'total_beli'        => $item->harga_jual *= $total_order,
        ]);


        if ($query && $reseller) {
            Alert::success("Berhasil!", "Order Berhasil!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Order Gagal!");
            return redirect()->back();
        }
    }

    public function updateHarga(Request $request, $id)
    {
        $query = BarangReseller::find($id)->update([
            'harga_jual'    => $request->harga_jual,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Menambah Harga Jual Berhasil!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Menambah Harga Jual Gagal!");
            return redirect()->back();
        }
    }
}
