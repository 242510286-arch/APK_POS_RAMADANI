<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    public function index()
    {
        $jenisProduks = JenisProduk::orderBy('nama_jenis')->get();

        return view('jenis-produk.index', compact('jenisProduks'));
    }

    public function create()
    {
        return view('jenis-produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_produks,nama_jenis',
        ], [
            'nama_jenis.required' => 'Nama jenis produk wajib diisi.',
            'nama_jenis.unique' => 'Jenis produk tersebut sudah ada.',
        ]);

        JenisProduk::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil ditambahkan.');
    }

    public function edit(JenisProduk $jenisProduk)
    {
        return view('jenis-produk.edit', compact('jenisProduk'));
    }

    public function update(Request $request, JenisProduk $jenisProduk)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_produks,nama_jenis,' . $jenisProduk->id,
        ], [
            'nama_jenis.required' => 'Nama jenis produk wajib diisi.',
            'nama_jenis.unique' => 'Jenis produk tersebut sudah ada.',
        ]);

        $jenisProduk->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil diperbarui.');
    }

    public function destroy(JenisProduk $jenisProduk)
    {
        $jenisProduk->delete();

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil dihapus.');
    }
}