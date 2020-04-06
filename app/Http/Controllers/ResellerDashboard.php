<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangReseller;
use App\Order_Reseller;
use App\Penjualan;
use App\Reseller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ResellerDashboard extends Controller
{
    public function index($page) {
        if(View::exists('reseller.pages.'. $page)) {

            if($page === "dashboard") {

                $data['title'] = "Dashboard";

                $data['reseller'] = Reseller::where('id_user', Auth::user()->id)->first();

                $data['beli_barang'] = DB::table('order_reseller')->where('id_reseller', $data['reseller']->id)->sum('total_harga');
                $data['total_barang'] = DB::table('barang_reseller')->where('id_reseller', $data['reseller']->id)->count('stock_barang');
                $data['hasil_jual'] = DB::table('penjualan')->where('id_reseller', $data['reseller']->id)->sum('jumlah_jual');
                $data['total_jual'] = DB::table('penjualan')->where('id_reseller', $data['reseller']->id)->sum('total_jual');
                $data['keuntungan'] = DB::table('penjualan')->where('id_reseller', $data['reseller']->id)->sum('keuntungan');

            } elseif($page === "penjualan") {

                $data['title'] = "Penjualan";

                $data['auth'] = Reseller::where('id_user', Auth::user()->id)->first();

                $data['reseller'] = Reseller::get();

                $data['barang']  = BarangReseller::where('id_reseller', $data['auth']->id)
                                ->join('barang', 'barang.id', '=', 'barang_reseller.id')
                                ->get();

                $data['data']   = Penjualan::where('penjualan.id_reseller', $data['auth']->id)
                                    ->join('barang', 'barang.id', '=', 'penjualan.id_barang')
                                    ->get();

            } elseif ($page === "data-barang") {

                $data['title'] = "Data Barang";

                $data['reseller'] = Reseller::where('id_user', Auth::user()->id)->first();

                $data['barang'] = Barang::get();

                $data['data']  = BarangReseller::where('id_reseller', $data['reseller']->id)
                                ->leftJoin('barang', 'barang.id', '=', 'barang_reseller.id_barang')
                                ->leftJoin('kategori', 'kategori.id', '=', 'barang_reseller.id_kategori')
                                ->orderByDesc('barang_reseller.created_at')
                                ->select('*', 'barang_reseller.id as id', 'barang_reseller.harga_jual as harga_jual', 'barang.harga_jual as harga_jual_item')->get();
                $data['riwayat'] = Order_Reseller::where('id_reseller', $data['reseller']->id)->join('barang', 'barang.id', '=', 'order_reseller.id_barang')->orderByDesc('order_reseller.created_at')
                ->get();

            } elseif($page === "profil") {

                $data['title'] = "Profil Reseller";

                $data['reseller'] = Reseller::where('id_user', Auth::user()->id)->first();
            }
        } else {

        }

        return view("reseller.pages.".$page, compact('page'))->with($data);
    }

    public function chartReseller(Request $request) {
        $reseller = Reseller::where('id_user', Auth::user()->id);

        foreach ($request->bulan as $key => $value) {
            $bulan[$key] = Order_Reseller::where('id_reseller', $reseller->id)->whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', $value)->sum('keuntungan');
        }

        return response()->json($bulan);
    }
}
