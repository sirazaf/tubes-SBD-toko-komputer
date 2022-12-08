<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KomputerController extends Controller
{
    public function index() {
        $datas = DB::select('select * from komputer');

        return view('komputer.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('komputer.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_komp' => 'required',
            'nama_komp' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO komputer(id_komp, nama_komp, stok, harga_jual) VALUES (:id_komp, :nama_komp, :stok, :harga_jual)',
        [
            'id_komp' => $request->id_komp,
            'nama_komp' => $request->nama_komp,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
        ]
        );

        return redirect()->route('komputer.index')->with('success', 'Data komputer berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('komputer')->where('id_komp', $id)->first();

        return view('komputer.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_komp' => 'required',
            'nama_komp' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE komputer SET id_komp = :id_komp, nama_komp = :nama_komp, stok = :stok WHERE id_komp = :id',
        [
            'id' => $id,
            'id_komp' => $request->id_komp,
            'nama_komp' => $request->nama_komp,
            'stok' => $request->stok,
            'harga_jual' => $request->harga_jual,
        ]
        );

        return redirect()->route('komputer.index')->with('success', 'Data komputer berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM komputer WHERE id_komp = :id_komp', ['id_komp' => $id]);

        return redirect()->route('komputer.index')->with('success', 'Data komputer berhasil dihapus');
    }

}