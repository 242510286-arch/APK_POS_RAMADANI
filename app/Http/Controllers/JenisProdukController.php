<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisProdukController extends Controller
{
    /**
     * Menampilkan daftar jenis produk
     */
    public function index()
    {
        $jenisProduks = JenisProduk::orderBy('nama_jenis')->get();

        return view('jenis-produk.index', compact('jenisProduks'));
    }

    /**
     * Menampilkan form tambah jenis produk
     */
    public function create()
    {
        return view('jenis-produk.create');
    }

    /**
     * Menyimpan jenis produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_produks,nama_jenis',
        ], [
            'nama_jenis.required' => 'Nama jenis produk wajib diisi.',
            'nama_jenis.unique' => 'Jenis produk tersebut sudah ada.',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        JenisProduk::create([
            'nama_jenis' => $request->nama_jenis,
            'created_by_name' => $user->name,
            'created_by_email' => $user->email,
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit jenis produk
     */
    public function edit(JenisProduk $jenisProduk)
    {
        return view('jenis-produk.edit', compact('jenisProduk'));
    }

    /**
     * Memperbarui jenis produk
     */
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

    /**
     * Menghapus jenis produk
     */
    public function destroy(JenisProduk $jenisProduk)
    {
        $jenisProduk->delete();

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil dihapus.');
    }
}