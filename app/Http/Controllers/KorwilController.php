<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Session;
class KorwilController extends Controller
{
    public function index()
    {
        $now = date("Y");
        $tahun = [];
        for ($i = 1979; $i <= $now; $i++) {
            $tahun[] = $i;
        }
        $prov = ProvinsiModel::all();
        return view('korwil.index', compact('prov', 'tahun'));
    }
    public function input(Request $request)
    {
        UserModel::create($request->all()
            // 'nama' => $request->input('nama'),
            // 'gender' => $request->input('gender'),
            // 'wa' => $request->input('wa'),
            // 'kerja' => $request->input('kerja'),
            // 'alamat' => $request->input('alamat'),
            // 'prov_id' => $request->input('prov_id'),
            // 'kab_id' => $request->input('kab_id'),
            // 'kec_id' => $request->input('kec_id'),
            // 'kel_id' => $request->input('kel_id'),
            // 'rt' => $request->input('rt'),
            // 'rw' => $request->input('rw'),
            // 'masuk' => $request->input('masuk'),
            // 'keluar' => $request->input('keluar')
        );
        Session::flash('success', 'Data berhasil diinput');
        return view('korwil.index');
    }
    public function kab($id)
    {
        $data = KabupatenModel::where('prov_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
    public function kec($id)
    {
        $data = KecamatanModel::where('kab_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
    public function kel($id)
    {
        $data = KelurahanModel::where('kec_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
}
