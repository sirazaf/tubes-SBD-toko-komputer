<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailTransaksiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from detail_transaksi');

        return view('detail_transaksi.index')
            ->with('datas', $datas);
    }

    public function create() {
        $komputer =  DB::select('select * from komputer');
        $pembeli = DB::select('select * from pembeli');
        //dd($komputer, $pembeli);
        // ini fungsi debugging
        // ini buat ngecek variable komputer dan pembeli
        // kalau mau di nonaktifkan tinggal di comment

        return view('detail_transaksi.add');
    }
}
