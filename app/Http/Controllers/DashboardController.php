<?php

namespace App\Http\Controllers;

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

            } else {

            }
        } else {

        }

        return view("adminty.pages.".$page, compact('page'))->with($data);
    }
}
