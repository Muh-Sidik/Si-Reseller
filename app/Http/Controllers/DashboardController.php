<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\Order_Supplier;
use App\Reseller;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index($page){
        if (View::exists("adminty.pages.". $page)) {

            if ($page === 'dashboard') {
                $data['title'] = "Dashboard - Si Reseller";

            } elseif ($page === 'data-barang') {
                $data['title'] = "Data Barang";
                $data['data'] = Barang::join('supplier', 'supplier.id', '=', 'barang.id_supplier')
                                ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                                ->select('*', 'supplier.id AS id_supp', 'barang.id as id_barang', 'kategori.id as id_kategori')
                                ->get();

                $data['supplier'] = Supplier::get();

                $data['kategori'] = Kategori::get();

                $data['order'] = Order_Supplier::join('barang', 'barang.id', '=', 'order_supplier.id_barang')
                                ->join('supplier', 'supplier.id', '=', 'order_supplier.id_supplier')
                                ->join('kategori', 'kategori.id', '=', 'order_supplier.id_kategori')
                                ->select('*', 'order_supplier.id as id_order', 'barang.id as id_barang', 'supplier.id as id_supp', 'kategori.id as id_kategori')
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
                ->join('kategori', 'kategori.id', '=', 'order_supplier.id_kategori')
                ->select('*', 'order_supplier.id as id_order', 'barang.id as id_barang', 'supplier.id as id_supp', 'kategori.id as id_kategori')
                ->get();

            } elseif ($page === 'alokasi-reseller') {
                # code...
            }
        } else {

        }

        return view("adminty.pages.".$page, compact('page'))->with($data);
    }
}
