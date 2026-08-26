@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if (session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>

<div class="row">

{{-- ================== PRODUK ================== --}}
<div class="col-md-6">
    <div class="card">
        <div class="card-body" style="max-height:70vh; overflow:auto">

            {{-- SEARCH PRODUK --}}
            <div class="mb-3">
                <form method="GET" action="{{ route('penjualan.create') }}">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari produk..."
                        onkeyup="this.form.submit()"
                    >
                </form>
            </div>

            {{-- DAFTAR PRODUK --}}
            @foreach($products as $product)

                <form
                    method="POST"
                    action="{{ route('itempenjualan.store') }}"
                    class="row mb-3 align-items-center"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $product->id }}"
                    >

                    {{-- INFORMASI PRODUK --}}
                    <div class="col-7">

                        <div class="d-flex align-items-center gap-2">

                            {{-- GAMBAR PRODUK --}}
                            @if($product->foto)
                                <img
                                    src="{{ asset('storage/'.$product->foto) }}"
                                    alt="{{ $product->nama }}"
                                    class="rounded-circle"
                                    style="
                                        width:45px;
                                        height:45px;
                                        object-fit:cover;
                                    "
                                >
                            @else
                                <div
                                    class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                    style="
                                        width:45px;
                                        height:45px;
                                        font-size:20px;
                                    "
                                >
                                    📦
                                </div>
                            @endif

                            {{-- NAMA DAN HARGA --}}
                            <div>
                                <div class="fw-semibold">
                                    {{ $product->nama }}
                                </div>

                                <small class="text-muted">
                                    Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                </small>

                                <br>

                                <small class="text-muted">
                                    Stok: {{ $product->stok }}
                                </small>
                            </div>

                        </div>

                    </div>

                    {{-- JUMLAH --}}
                    <div class="col-2">

                        <input
                            type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stok }}"
                            class="form-control"
                            {{ $product->stok <= 0 || $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                        >

                    </div>

                    {{-- MASUKKAN KERANJANG --}}
                    <div class="col-3">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                            {{ $product->stok <= 0 || $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                        >
                            🛒 Masukkan
                        </button>

                    </div>

                </form>

            @endforeach

        </div>
    </div>
</div>


{{-- ================== KERANJANG ================== --}}
<div class="col-md-6">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                🛒 Keranjang
            </h5>
        </div>

        <table class="table table-bordered mb-0">

            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($sale->itemPenjualan as $item)

                    <tr>

                        {{-- PRODUK --}}
                        <td>
                            {{ $item->produk->nama }}
                        </td>

                        {{-- HARGA --}}
                        <td>
                            Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                        </td>

                        {{-- QTY --}}
                        <td>

                            <form
                                method="POST"
                                action="{{ route('itempenjualan.update', $item->id) }}"
                                class="d-flex gap-1"
                            >

                                @csrf
                                @method('PUT')

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item->kuantitas }}"
                                    min="1"
                                    class="form-control"
                                    style="width:75px;"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                >

                                @if($sale->status !== 'COMPLETED')
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Update jumlah"
                                    >
                                        ✓
                                    </button>
                                @endif

                            </form>

                        </td>

                        {{-- SUBTOTAL --}}
                        <td>
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>

                        {{-- HAPUS --}}
                        <td>

                            @if($sale->status !== 'COMPLETED')

                                @can('delete', $item)

                                    <form
                                        method="POST"
                                        action="{{ route('itempenjualan.destroy', $item->id) }}"
                                        onsubmit="return confirm('Hapus produk dari keranjang?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                @endcan

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-muted py-4"
                        >
                            🛒 Keranjang masih kosong
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- ================== TOTAL & PEMBAYARAN ================== --}}
        <div class="card-footer">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <span class="fw-semibold">
                    Total Pembayaran
                </span>

                <strong class="text-primary fs-5">
                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                </strong>

            </div>


            {{-- PEMBAYARAN --}}
            @if($sale->status !== 'COMPLETED')

                <form
                    method="POST"
                    action="{{ route('penjualan.update', $sale->id) }}"
                    onsubmit="return confirm('Yakin ingin menyelesaikan pembayaran?')"
                >

                    @csrf
                    @method('PUT')

                    <select
                        name="payment_method"
                        class="form-select mb-2"
                        required
                    >
                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="CASH">
                            💵 Cash
                        </option>

                        <option value="QRIS">
                            📱 QRIS
                        </option>

                    </select>

                    <button
                        type="submit"
                        class="btn btn-success w-100"
                        {{ $sale->itemPenjualan->count() === 0 ? 'disabled' : '' }}
                    >
                        💳 Selesaikan Pembayaran
                    </button>

                </form>


                {{-- BATAL TRANSAKSI --}}
                @can('delete', $sale)

                    <form
                        action="{{ route('penjualan.destroy', $sale->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-outline-danger w-100 mt-2"
                        >
                            Batal Transaksi
                        </button>

                    </form>

                @endcan

            @else

                <div class="alert alert-success text-center mb-0">
                    ✓ Transaksi sudah selesai
                </div>

            @endif

        </div>

    </div>

</div>

</div>

@endsection