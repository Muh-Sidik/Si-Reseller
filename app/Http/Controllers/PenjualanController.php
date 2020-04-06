<?php

namespace App\Http\Controllers;

use App\BarangReseller;
use App\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{

    public function store(Request $request)
    {
        $validate = $request->validate([
            'order' => 'required',
            'id_barang'   => 'required',
        ]);

        $input = $request->input('id_barang');
        $order = $request->input('order');
        $barang = BarangReseller::where('id_barang', '=' ,$input)
                    ->where('id_reseller', '=' ,$request->id_reseller);

        BarangReseller::where('id_barang', $input)->where('id_reseller', $request->id_reseller)->update([
            'stock_barang'  => $barang->stock_barang -= $order,
        ]);

        $modal = $barang->harga_beli * $order;
        $jual = $barang->harga_jual * $order;

        $query = Penjualan::create([
            'id_reseller'   => $request->id_reseller,
            'id_barang'     => $input,
            'jumlah_jual'   => $order,
            'total_jual'    => $barang->harga_jual *= $order,
            'keuntungan'    => $jual -= $modal,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Penjualan Berhasil!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Penjualan Gagal!");
            return redirect()->back();
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Penjualan::find($id);
        $total_order = $order->jumlah_jual;
        $barang = BarangReseller::find($order->id_barang);

        BarangReseller::find($order->id_barang)->update([
            'stock_barang' => $barang->stock_barang += $total_order,
        ]);

        $query = Penjualan::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Order Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Order Gagal dihapus!");
            return redirect()->back();
        }
    }
}
