<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        // Mengambil semua data kontak dari database
        $kontak = Kontak::all();
        return view('kontak.index', compact('kontak'));
    }
    public function create()
    {
        // Menampilkan form untuk menambah kontak baru
        return view('kontak.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);
        /* Menyimpan data kontak baru ke database 
        $kontak = new Kontak;
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        */
        Kontak::create($request->only(['nama', 'email', 'pesan']));
        return redirect('/kontak')->with('sukses', 'Pesan berhasil dikirim');
    }

    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.show', compact('kontak'));
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'pesan' => 'required'
        ]);
        $kontak = Kontak::findOrFail($id);
        $kontak->update($request->only(['nama', 'email', 'pesan']));
        return redirect("/kontak/{$id}")->with('sukses', 'Kontak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        return redirect('/kontak')->with('sukses', 'Kontak berhasil dihapus.');
    }
}
