<?php

namespace App\Http\Controllers;

use App\Reseller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResellerController extends Controller
{
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_reseller' => "required",
            'no_wa'         => 'required|numeric',
            'domisili'      =>  "required",
        ]);

        $query = Reseller::create([
            'nama_reseller' => $request->nama_reseller,
            'no_wa'         => $request->no_wa,
            'domisili'      => $request->domisili,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Reseller Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Reseller Gagal ditambah!");
            return redirect()->back();
        }
        
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_reseller' => "required",
            'no_wa'         => 'required|numeric',
            'domisili'      =>  "required",
        ]);

        $query = Reseller::find($id)->pdate([
            'nama_reseller' => $request->nama_reseller,
            'no_wa'         => $request->no_wa,
            'domisili'      => $request->domisili,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Nama Reseller Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Reseller Gagal diubah!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $query = Reseller::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Nama Reseller Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Nama Reseller Gagal dihapus!");
            return redirect()->back();
        }
    }
}
