<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\Order_Reseller;
use App\Order_Supplier;
use App\Reseller;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{

    public function index($page){
        if (View::exists("adminty.pages.". $page)) {

            if ($page === 'dashboard') {

                $data['title'] = "Dashboard - Si Reseller";

                $data['beli_barang'] = DB::table('order_supplier')->sum('total_harga');
                $data['jual_barang'] = DB::table('order_reseller')->sum('total_harga');
                $data['total_barang'] = DB::table('barang')->count('id');
                $data['total_reseller'] = DB::table('reseller')->count('id');
                $data['total_supplier'] = DB::table('supplier')->count('id');
                $data['total_jual'] = DB::table('order_reseller')->count('id');

            } elseif ($page === 'data-barang') {
                $data['title']  = "Data Barang";
                $data['data']   = Barang::join('supplier', 'supplier.id', '=', 'barang.id_supplier')
                                ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                                ->select('*', 'supplier.id AS id_supp', 'barang.id as id_barang', 'kategori.id as id_kategori')
                                ->latest('barang.created_at')
                                ->get();

                $data['supplier'] = Supplier::get();

                $data['kategori'] = Kategori::get();

                $data['order'] = Order_Supplier::join('barang', 'barang.id', '=', 'order_supplier.id_barang')
                                ->join('supplier', 'supplier.id', '=', 'order_supplier.id_supplier')
                                ->join('kategori', 'kategori.id', '=', 'order_supplier.id_kategori')->latest('order_supplier.created_at')
                                ->get();

            }elseif ($page === 'data-kategori') {

                $data['title'] = 'Data Kategori';
                $data['data'] = Kategori::get();

            } elseif ($page === 'data-reseller') {

                $data['title'] = 'Data Reseller';
                $data['data'] = Reseller::get();

            } elseif ($page === 'data-supplier') {

                $data['title'] = 'Data Supplier';
                $data['data'] = Supplier::get();

            } elseif ($page === 'alokasi-supplier') {

                $data['title'] = "Tambah Stock Barang";

                $data['data'] = Supplier::get();


                $data['order'] = Order_Supplier::join('barang', 'barang.id', '=', 'order_supplier.id_barang')
                ->join('supplier', 'supplier.id', '=', 'order_supplier.id_supplier')
                ->join('kategori', 'kategori.id', '=', 'order_supplier.id_kategori')->latest('order_supplier.created_at')
                ->get();

            } elseif ($page === 'alokasi-reseller') {

                $data['title'] = "Reseller Order";
                $data['reseller'] = Reseller::get();
                $data['barang']   = Barang::get();
                $data['data']     = Order_Reseller::leftJoin('barang', 'barang.id', '=', 'order_reseller.id_barang')
                                    ->leftJoin('reseller', 'reseller.id', '=', 'order_reseller.id_reseller')->orderByDesc('order_reseller.created_at')
                                    ->get();
            }
        } else {

        }

        return view("adminty.pages.".$page, compact('page'))->with($data);
    }

    public function chartJual(Request $request) {
        foreach ($request->bulan as $key => $value) {
            $bulan[$key] = Order_Reseller::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', $value)->sum('total_harga');
        }

        return response()->json($bulan);
    }
}
