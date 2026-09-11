<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TAMBAHAN:
        // Menerima product_id / quantity jika masih dikirim
        // dari form lama, lalu mengubahnya menjadi
        // produk_id / kuantitas.
        $request->merge([
            'produk_id' => $request->input('produk_id')
                ?? $request->input('product_id'),

            'kuantitas' => $request->input('kuantitas')
                ?? $request->input('quantity'),
        ]);

        // Validasi
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'kuantitas' => 'required|integer|min:1'
        ]);

        $sale = Penjualan::where('user_id', Auth::id())
            ->where('status', 'OPEN')
            ->first();

        // Jika transaksi OPEN tidak ditemukan
        if (!$sale) {
            return redirect()
                ->route('penjualan.create')
                ->with('errors', 'Transaksi penjualan tidak ditemukan.');
        }

        DB::transaction(function () use ($request, $sale) {

            $product = Produk::lockForUpdate()
                ->find($request->produk_id);

            // Jika produk tidak ditemukan
            if (!$product) {
                abort(404, 'Produk tidak ditemukan.');
            }

            // Cek stok
            if ($product->stok < $request->kuantitas) {
                abort(422, 'Stok produk tidak mencukupi.');
            }

            // Kurangi stok
            $product->decrement(
                'stok',
                $request->kuantitas
            );

            // Cek apakah produk sudah ada di keranjang
            $item = ItemPenjualan::where(
                    'penjualan_id',
                    $sale->id
                )
                ->where(
                    'produk_id',
                    $product->id
                )
                ->lockForUpdate()
                ->first();

            if ($item) {

                // Jika produk sudah ada,
                // tambahkan kuantitas
                $item->kuantitas += $request->kuantitas;

            } else {

                // Jika produk belum ada,
                // buat item baru
                $item = new ItemPenjualan([
                    'penjualan_id' => $sale->id,
                    'produk_id' => $product->id,
                    'kuantitas' => $request->kuantitas,
                    'harga_satuan' => $product->harga_jual,
                ]);
            }

            // Hitung subtotal
            $item->subtotal =
                $item->kuantitas *
                $item->harga_satuan;

            $item->save();

            // Hitung ulang total pembayaran
            $sale->total_pembayaran =
                $sale->itemPenjualan()
                    ->sum('subtotal');

            $sale->save();
        });

        return back()->with(
            'success',
            'Produk berhasil dimasukkan ke keranjang.'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        ItemPenjualan $itempenjualan
    ) {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        DB::transaction(function () use (
            $request,
            $itempenjualan
        ) {

            $produk = $itempenjualan->produk()
                ->lockForUpdate()
                ->first();

            if (!$produk) {
                abort(404, 'Produk tidak ditemukan.');
            }

            $selisih =
                $request->quantity -
                $itempenjualan->kuantitas;

            // Jika jumlah ditambah
            if ($selisih > 0) {

                if ($produk->stok < $selisih) {
                    abort(422, 'Stok tidak mencukupi.');
                }

                $produk->decrement(
                    'stok',
                    $selisih
                );
            }

            // Jika jumlah dikurangi
            if ($selisih < 0) {
                $produk->increment(
                    'stok',
                    abs($selisih)
                );
            }

            // Update item
            $itempenjualan->update([
                'kuantitas' => $request->quantity,
                'subtotal' =>
                    $request->quantity *
                    $itempenjualan->harga_satuan
            ]);

            // Update total penjualan
            $itempenjualan->penjualan->update([
                'total_pembayaran' =>
                    $itempenjualan
                        ->penjualan
                        ->itemPenjualan()
                        ->sum('subtotal')
            ]);
        });

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize(
            'delete',
            $itempenjualan
        );

        DB::transaction(function () use (
            $itempenjualan
        ) {

            $produk = $itempenjualan->produk;
            $sale = $itempenjualan->penjualan;

            if ($produk) {

                // Kembalikan stok
                $produk->increment(
                    'stok',
                    $itempenjualan->kuantitas
                );
            }

            // Hapus item dari keranjang
            $itempenjualan->delete();

            // Hitung ulang total
            $sale->update([
                'total_pembayaran' =>
                    $sale->itemPenjualan()
                        ->sum('subtotal')
            ]);
        });

        return back();
    }
}