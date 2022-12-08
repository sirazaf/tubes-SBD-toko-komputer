<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PembeliController extends Controller
{
    public function index() {
        $datas = DB::select('select * from pembeli');

        return view('pembeli.index')
            ->with('datas', $datas);
    }
    
    public function create() {
        return view('pembeli.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembeli(id_pembeli, nama_pembeli, alamat) VALUES (:id_pembeli, :nama_pembeli, :alamat)',
        [
            'id_pembeli' => $request->id_pembeli,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
        ]
        );

        // Menggunakan laravel eloquent
        // pembeli::create([
        //     'id_pembeli' => $request->id_pembeli,
        //     'nama_pembeli' => $request->nama_pembeli,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();

        return view('pembeli.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'alamat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pembeli SET id_pembeli = :id_pembeli, nama_pembeli = :nama_pembeli, alamat = :alamat WHERE id_pembeli = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
        ]
        );

        // Menggunakan laravel eloquent
        // pembeli::where('id_pembeli', $id)->update([
        //     'id_pembeli' => $request->id_pembeli,
        //     'nama_pembeli' => $request->nama_pembeli,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);

        // Menggunakan laravel eloquent
        // pembeli::where('id_pembeli', $id)->delete();

        return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil dihapus');
    }

}