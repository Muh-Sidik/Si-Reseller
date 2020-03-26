<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ResellerDashboard extends Controller
{
    public function index($page) {
        if(View::exists('reseller.pages.'. $page)) {

            if($page === "dashboard") {

                $data['title'] = "Dashboard";

            } elseif($page === "penjualan") {

                $data['title'] = "Penjualan";

            }
        } else {

        }

        return view("reseller.pages.".$page, compact('page'))->with($data);
    }
}
