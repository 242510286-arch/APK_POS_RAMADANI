<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Produk::class);

        $keyword = $request->input('search');

        $products = Produk::with(['user', 'jenis'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('products'));
    }


    /**
     * Menampilkan halaman tambah produk
     */
    public function create()
    {
        $this->authorize('create', Produk::class);

        $jenis = JenisProduk::all();

        return view('produk.create', compact('jenis'));
    }


    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        $this->authorize('create', Produk::class);

        $validated = $request->validate([
            'nama_produk' => [
                'required',
                'string',
                'max:255',
            ],

            'jenis_id' => [
                'required',
                'exists:jenis_produks,id',
            ],

            'harga_beli' => [
                'required',
                'numeric',
                'min:0',
            ],

            'harga_jual' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stok' => [
                'required',
                'integer',
                'min:0',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        $data = [
            'user_id'    => Auth::id(),
            'jenis_id'   => $validated['jenis_id'],
            'nama'       => $validated['nama_produk'],
            'harga_beli' => $validated['harga_beli'],
            'harga_jual' => $validated['harga_jual'],
            'stok'       => $validated['stok'],
        ];


        if ($request->hasFile('gambar')) {

            $data['foto'] = $request
                ->file('gambar')
                ->store('products', 'public');
        }


        Produk::create($data);


        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail produk
     */
    public function show(Produk $produk)
    {
        $this->authorize('view', $produk);

        $produk->load(['user', 'jenis']);

        return view('produk.show', compact('produk'));
    }


    /**
     * Menampilkan halaman edit produk
     */
    public function edit(Produk $produk)
    {
        $this->authorize('update', $produk);

        $jenis = JenisProduk::all();

        return view('produk.edit', compact('produk', 'jenis'));
    }


    /**
     * Mengupdate produk
     */
    public function update(Request $request, Produk $produk)
    {
        $this->authorize('update', $produk);

        $validated = $request->validate([
            'nama_produk' => [
                'required',
                'string',
                'max:255',
            ],

            'jenis_id' => [
                'required',
                'exists:jenis_produks,id',
            ],

            'harga_beli' => [
                'required',
                'numeric',
                'min:0',
            ],

            'harga_jual' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stok' => [
                'required',
                'integer',
                'min:0',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA YANG DISIMPAN
        |--------------------------------------------------------------------------
        */

        $data = [
            'user_id'    => Auth::id(),
            'jenis_id'   => $validated['jenis_id'],
            'nama'       => $validated['nama_produk'],
            'harga_beli' => $validated['harga_beli'],
            'harga_jual' => $validated['harga_jual'],
            'stok'       => $validated['stok'],
        ];


        /*
        |--------------------------------------------------------------------------
        | FOTO BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }

            $data['foto'] = $request
                ->file('gambar')
                ->store('products', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $produk->update($data);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Menghapus produk
     */
    public function destroy(Produk $produk)
    {
        $this->authorize('delete', $produk);

        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}