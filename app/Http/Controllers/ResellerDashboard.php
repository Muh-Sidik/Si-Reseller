<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangReseller;
use App\Penjualan;
use App\Reseller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ResellerDashboard extends Controller
{
    public function index($page) {
        if(View::exists('reseller.pages.'. $page)) {

            if($page === "dashboard") {

                $data['title'] = "Dashboard";

            } elseif($page === "penjualan") {

                $data['title'] = "Penjualan";
                $data['auth'] = Reseller::where('id_user', Auth::user()->id)->first();
                $data['reseller'] = Reseller::get();
                $data['barang']  = BarangReseller::where('id_reseller', $data['auth']->id)
                                ->get();
                $data['data']   = Penjualan::where('penjualan.id_reseller', $data['auth']->id)
                                    ->join('barang_reseller', 'barang_reseller.id', '=', 'penjualan.id_barang_reseller')
                                    ->get();

            } elseif ($page === "data-barang") {

                $data['title'] = "Data Barang";
                $data['reseller'] = Reseller::where('id_user', Auth::user()->id)->first();
                $data['barang'] = Barang::get();
                $data['data']  = BarangReseller::where('id_reseller', $data['reseller']->id)
                                ->join('kategori', 'kategori.id', '=', 'barang_reseller.id_kategori')->get();

            } elseif($page === "profil") {

                $data['title'] = "Profil Reseller";
                $data['reseller'] = Reseller::where('id_user', Auth::user()->id)->first();
            }
        } else {

        }

        return view("reseller.pages.".$page, compact('page'))->with($data);
    }
}
