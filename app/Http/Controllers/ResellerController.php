<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class ResellerController extends Controller
{

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_reseller' => "required",
            'no_wa'         => 'required|numeric',
            'domisili'      =>  "required",
            'username'      => 'required',
            'password'      => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level'    => $request->level,
        ]);

        $query = Reseller::create([
            'id_user'       => $user->id,
            'nama_reseller' => $request->nama_reseller,
            'no_wa'         => $request->no_wa,
            'domisili'      => $request->domisili,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Data Reseller Berhasil ditambah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Reseller Gagal ditambah!");
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

        $query = Reseller::find($id)->update([
            'nama_reseller' => $request->nama_reseller,
            'no_wa'         => $request->no_wa,
            'domisili'      => $request->domisili,
        ]);

        if ($query) {
            Alert::success("Berhasil!", "Data Reseller Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Reseller Gagal diubah!");
            return redirect()->back();
        }
    }

    public function change(Request $request, $id)
    {
        $validate = $request->validate([
            'username' => "required",
            'password' => 'required',
        ]);

        $user = User::find($id)->update([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($user) {
            Alert::success("Berhasil!", "Data Reseller Berhasil diubah!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Reseller Gagal diubah!");
            return redirect()->back();
        }


    }

    public function destroy($id)
    {
        $user = Reseller::find($id);

        User::destroy($user->id_user);

        $query = Reseller::destroy($id);

        if ($query) {
            Alert::success("Berhasil!", "Data Reseller Berhasil dihapus!");
            return redirect()->back();
        } else {
            Alert::error("Gagal", "Data Reseller Gagal dihapus!");
            return redirect()->back();
        }
    }

}
