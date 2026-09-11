@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<style>
.sale-page {
    min-height: calc(100vh - 70px);
    background: linear-gradient(135deg, #fff0f5, #fde7ef);
    padding: 40px 20px;
}

.sale-card {
    max-width: 1100px;
    margin: auto;
    background: white;
    border-radius: 24px;
    padding: 30px;
    box-shadow: 0 15px 40px rgba(190, 80, 120, 0.12);
}

.sale-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
}

.sale-icon {
    width: 52px;
    height: 52px;
    background: #df638d;
    color: white;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.sale-header h2 {
    margin: 0;
    color: #44303a;
    font-size: 25px;
    font-weight: 700;
}

.sale-header p {
    margin: 4px 0 0;
    color: #b18a9a;
    font-size: 13px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 30px;
}

.info-box {
    background: #fffafd;
    border: 1px solid #f0cbd9;
    border-radius: 14px;
    padding: 15px;
}

.info-box small {
    display: block;
    color: #b18a9a;
    margin-bottom: 5px;
    font-size: 12px;
}

.info-box strong {
    color: #624451;
    font-size: 15px;
}

.status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    background: #fde1eb;
    color: #c84f78;
    font-size: 12px;
    font-weight: 600;
}

.table-wrapper {
    overflow-x: auto;
    border: 1px solid #f0cbd9;
    border-radius: 15px;
}

.sale-table {
    width: 100%;
    border-collapse: collapse;
}

.sale-table th {
    background: #fff1f6;
    color: #624451;
    padding: 14px;
    text-align: left;
    font-size: 13px;
}

.sale-table td {
    padding: 14px;
    border-top: 1px solid #f4dce5;
    color: #624451;
    font-size: 13px;
}

.sale-table tr:hover {
    background: #fffafd;
}

.total-area {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end;
}

.total-box {
    width: 300px;
    background: #fff1f6;
    border: 1px solid #f0cbd9;
    border-radius: 15px;
    padding: 18px;
}

.total-box div {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    color: #624451;
}

.total-box .total {
    border-top: 1px solid #efbfd0;
    padding-top: 12px;
    margin-top: 10px;
    font-size: 18px;
    font-weight: 700;
    color: #d65380;
}

.button-area {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #f2d7e1;
}

.btn-kembali {
    display: inline-block;
    text-decoration: none;
    color: #a55d79;
    border: 1px solid #efbfd0;
    padding: 11px 24px;
    border-radius: 10px;
    font-weight: 600;
    background: white;
}

.btn-kembali:hover {
    background: #fff4f8;
}


/* =========================================
   TOMBOL CETAK
========================================= */

.btn-cetak {
    display: inline-block;
    color: white;
    border: 1px solid #df638d;
    padding: 11px 24px;
    border-radius: 10px;
    font-weight: 600;
    background: #df638d;
    cursor: pointer;
    margin-left: 10px;
}

.btn-cetak:hover {
    background: #c94f78;
}


/* =========================================
   MODE OPEN: TAMBAH & KELOLA PRODUK
========================================= */

.cart-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.panel-title {
    color: #624451;
    margin-bottom: 15px;
    font-size: 15px;
    font-weight: 700;
}

.search-box input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #f0cbd9;
    border-radius: 10px;
    margin-bottom: 15px;
    font-size: 13px;
    box-sizing: border-box;
}

.product-scroll {
    max-height: 420px;
    overflow-y: auto;
    padding-right: 5px;
}

.product-row {
    display: flex;
    align-items: center;
    gap: 10px;
    border: 1px solid #f0cbd9;
    border-radius: 12px;
    padding: 10px 12px;
    margin-bottom: 10px;
    background: #fffafd;
}

.product-row .p-info {
    flex: 1;
    min-width: 0;
}

.product-row .p-name {
    color: #44303a;
    font-weight: 600;
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-row .p-meta {
    color: #b18a9a;
    font-size: 12px;
}

.product-row .qty-input {
    width: 55px;
    padding: 6px;
    border: 1px solid #f0cbd9;
    border-radius: 8px;
    text-align: center;
}

.btn-add-product {
    background: #df638d;
    color: white;
    border: none;
    padding: 7px 14px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    font-size: 13px;
    white-space: nowrap;
}

.btn-add-product:hover {
    background: #c94f78;
}

.btn-add-product:disabled {
    background: #e9c3d1;
    cursor: not-allowed;
}

.cart-item-qty-form {
    display: flex;
    gap: 6px;
    align-items: center;
}

.cart-item-qty-form input {
    width: 55px;
    padding: 5px;
    border: 1px solid #f0cbd9;
    border-radius: 6px;
    text-align: center;
}

.btn-mini {
    border: none;
    padding: 5px 9px;
    border-radius: 6px;
    font-size: 12px;
    cursor: pointer;
}

.btn-mini-ok {
    background: #df638d;
    color: white;
}

.btn-mini-del {
    background: #fdecef;
    color: #c94f4f;
}

.payment-select {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #f0cbd9;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.btn-selesai {
    width: 100%;
    background: #3fae6a;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
}

.btn-selesai:disabled {
    background: #b7ddc4;
    cursor: not-allowed;
}

.btn-batal-transaksi {
    width: 100%;
    background: white;
    border: 1px solid #f0b3b3;
    color: #c94f4f;
    padding: 11px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 8px;
}

.alert-box {
    padding: 12px 16px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 13px;
}

.alert-danger-box {
    background: #fdecef;
    color: #c94f4f;
    border: 1px solid #f5c2c7;
}

.alert-success-box {
    background: #e6f6ec;
    color: #2f7a4d;
    border: 1px solid #b7ddc4;
}


/* =========================================
   BARCODE QRIS
========================================= */

.qris-barcode-box {
    display: none;
    text-align: center;
    background: #fffafd;
    border: 1px solid #f0cbd9;
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 12px;
}

.qris-barcode-box.show {
    display: block;
}

.qris-barcode-box img {
    width: 180px;
    height: 180px;
    object-fit: contain;
}

.qris-barcode-box p {
    margin: 8px 0 0;
    font-size: 12px;
    color: #b18a9a;
}


/* =========================================
   INPUT UANG TUNAI & KEMBALIAN
========================================= */

.cash-input-box {
    display: none;
    background: #fffafd;
    border: 1px solid #f0cbd9;
    border-radius: 12px;
    padding: 14px;
    margin-bottom: 12px;
}

.cash-input-box.show {
    display: block;
}

.cash-label {
    display: block;
    font-size: 12px;
    color: #b18a9a;
    margin-bottom: 6px;
}

.cash-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #f0cbd9;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

.kembalian-display {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid #f0cbd9;
}

.kembalian-display span {
    font-size: 13px;
    color: #624451;
}

.kembalian-display strong {
    font-size: 16px;
    color: #3fae6a;
}

.kembalian-display strong.kurang {
    color: #c94f4f;
}


/* =========================================
   MODAL STRUK
========================================= */

.struk-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(50, 30, 40, 0.55);
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.struk-modal.active {
    display: flex;
}

.struk-container {
    width: 360px;
    max-width: 100%;
    background: white;
    padding: 25px 22px;
    border-radius: 8px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25);
    font-family: "Courier New", monospace;
    color: #222;
}

.struk-header {
    text-align: center;
    margin-bottom: 15px;
}

.struk-header h2 {
    margin: 0;
    font-size: 21px;
    font-weight: bold;
    letter-spacing: 1px;
}

.struk-header p {
    margin: 4px 0;
    font-size: 12px;
}

.struk-line {
    border-top: 1px dashed #333;
    margin: 12px 0;
}

.struk-info {
    font-size: 12px;
    line-height: 1.6;
}

.struk-info div {
    display: flex;
    justify-content: space-between;
}

.struk-produk {
    margin-top: 10px;
    font-size: 12px;
}

.struk-item {
    margin-bottom: 10px;
}

.struk-item-name {
    font-weight: bold;
    margin-bottom: 3px;
}

.struk-item-detail {
    display: flex;
    justify-content: space-between;
}

.struk-item-detail span:first-child {
    color: #555;
}

.struk-total {
    font-size: 13px;
}

.struk-total div {
    display: flex;
    justify-content: space-between;
    margin-bottom: 6px;
}

.struk-total .grand-total {
    font-size: 17px;
    font-weight: bold;
}

.struk-footer {
    text-align: center;
    margin-top: 18px;
    font-size: 12px;
    line-height: 1.5;
}

.struk-buttons {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.btn-print-struk {
    flex: 1;
    border: none;
    padding: 11px;
    border-radius: 8px;
    background: #df638d;
    color: white;
    font-weight: bold;
    cursor: pointer;
}

.btn-print-struk:hover {
    background: #c94f78;
}

.btn-tutup-struk {
    flex: 1;
    border: 1px solid #efbfd0;
    padding: 11px;
    border-radius: 8px;
    background: white;
    color: #a55d79;
    font-weight: bold;
    cursor: pointer;
}

.btn-tutup-struk:hover {
    background: #fff4f8;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 900px) {
    .cart-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {

    .info-grid {
        grid-template-columns: 1fr;
    }

    .sale-card {
        padding: 20px;
    }

    .struk-container {
        width: 330px;
    }
}


/* =========================================
   CETAK STRUK
========================================= */

@media print {

    body * {
        visibility: hidden;
    }

    .struk-modal,
    .struk-modal * {
        visibility: visible;
    }

    .struk-modal {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
        display: flex !important;
        background: white !important;
        padding: 0;
    }

    .struk-container {
        width: 80mm;
        max-width: 80mm;
        box-shadow: none;
        border-radius: 0;
        padding: 10px;
    }

    .struk-buttons {
        display: none !important;
    }
}
</style>


<div class="sale-page">

    <div class="sale-card">

        {{-- HEADER --}}
        <div class="sale-header">

            <div class="sale-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <div>
                <h2>Detail Penjualan</h2>
                <p>Informasi lengkap transaksi penjualan</p>
            </div>

        </div>


        {{-- NOTIFIKASI --}}
        @if (session('errors'))
            <div class="alert-box alert-danger-box">
                {{ session('errors') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert-box alert-success-box">
                {{ session('success') }}
            </div>
        @endif


        {{-- INFORMASI TRANSAKSI --}}
        <div class="info-grid">

            <div class="info-box">
                <small>ID Transaksi</small>
                <strong>#{{ $penjualan->id }}</strong>
            </div>

            <div class="info-box">
                <small>Status</small>
                <span class="status">{{ $penjualan->status }}</span>
            </div>

            <div class="info-box">
                <small>Metode Pembayaran</small>
                <strong>{{ $penjualan->metode_pembayaran ?? '-' }}</strong>
            </div>

        </div>


        @if($penjualan->status === 'OPEN')

            {{-- ====================================================
                 MODE OPEN: BISA TAMBAH, UBAH QTY, HAPUS PRODUK
            ==================================================== --}}
            <div class="cart-layout">

                {{-- KIRI: CARI & TAMBAH PRODUK --}}
                <div>
                    <h4 class="panel-title"><i class="bi bi-search"></i> Cari &amp; Tambah Produk</h4>

                    <div class="search-box">
                        <form method="GET" action="{{ route('penjualan.show', $penjualan->id) }}">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Ketik nama produk..."
                                onkeyup="this.form.submit()"
                            >
                        </form>
                    </div>

                    <div class="product-scroll">

                        @forelse($products as $product)

                            <form
                                method="POST"
                                action="{{ route('itempenjualan.store') }}"
                                class="product-row"
                            >
                                @csrf

                                <input type="hidden" name="penjualan_id" value="{{ $penjualan->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="p-info">
                                    <div class="p-name">{{ $product->nama }}</div>
                                    <div class="p-meta">
                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                        &middot; Stok: {{ $product->stok }}
                                    </div>
                                </div>

                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    max="{{ $product->stok }}"
                                    class="qty-input"
                                    {{ $product->stok <= 0 ? 'disabled' : '' }}
                                >

                                <button
                                    type="submit"
                                    class="btn-add-product"
                                    {{ $product->stok <= 0 ? 'disabled' : '' }}
                                >
                                    + Tambah
                                </button>

                            </form>

                        @empty

                            <p style="text-align:center; color:#b18a9a; padding:20px;">
                                Produk tidak ditemukan.
                            </p>

                        @endforelse

                    </div>
                </div>

                {{-- KANAN: KERANJANG --}}
                <div>
                    <h4 class="panel-title"><i class="bi bi-cart"></i> Produk yang Dibeli</h4>

                    <div class="table-wrapper" style="margin-bottom:15px;">
                        <table class="sale-table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($penjualan->itemPenjualan as $item)

                                    <tr>
                                        <td>{{ $item->produk->nama ?? '-' }}</td>

                                        <td>
                                            <form
                                                method="POST"
                                                action="{{ route('itempenjualan.update', $item->id) }}"
                                                class="cart-item-qty-form"
                                            >
                                                @csrf
                                                @method('PUT')

                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    value="{{ $item->kuantitas }}"
                                                    min="1"
                                                >

                                                <button type="submit" class="btn-mini btn-mini-ok">✓</button>
                                            </form>
                                        </td>

                                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>

                                        <td>
                                            <form
                                                method="POST"
                                                action="{{ route('itempenjualan.destroy', $item->id) }}"
                                                onsubmit="return confirm('Hapus produk dari keranjang?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-mini btn-mini-del">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" style="text-align:center; padding:20px;">
                                            Keranjang masih kosong.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    {{-- TOTAL --}}
                    <div class="total-box" style="margin-bottom:15px;">
                        <div class="total">
                            <span>Total</span>
                            <span>Rp {{ number_format($penjualan->total_pembayaran ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- SELESAIKAN PEMBAYARAN --}}
                    <form
                        method="POST"
                        action="{{ route('penjualan.update', $penjualan->id) }}"
                        onsubmit="return konfirmasiBayar()"
                    >
                        @csrf
                        @method('PUT')

                        <select
                            name="payment_method"
                            id="paymentMethod"
                            class="payment-select"
                            onchange="toggleQrisBarcode(); toggleCashInput();"
                            required
                        >
                            <option value="">Pilih Pembayaran</option>
                            <option value="CASH"> Cash</option>
                            <option value="QRIS"> QRIS</option>
                        </select>

                        {{-- BARCODE QRIS --}}
                        <div id="qrisBarcodeBox" class="qris-barcode-box">
                            <img src="{{ asset('images/qris.png') }}" alt="QRIS">
                            <p>Scan QR code ini menggunakan aplikasi e-wallet / m-banking</p>
                        </div>

                        {{-- INPUT UANG TUNAI + KEMBALIAN --}}
                        <div id="cashInputBox" class="cash-input-box">

                            <label class="cash-label">Uang Diterima</label>
                            <input
                                type="number"
                                name="uang_diterima"
                                id="uangDiterima"
                                class="cash-input"
                                min="0"
                                placeholder="Masukkan jumlah uang tunai"
                                oninput="hitungKembalian()"
                            >

                            <div class="kembalian-display">
                                <span>Kembalian</span>
                                <strong id="kembalianText">Rp 0</strong>
                            </div>

                        </div>

                        <button
                            type="submit"
                            class="btn-selesai"
                            {{ $penjualan->itemPenjualan->count() === 0 ? 'disabled' : '' }}
                        >
                             Selesaikan Pembayaran
                        </button>
                    </form>

                    {{-- BATAL TRANSAKSI --}}
                    @can('delete', $penjualan)
                        <form
                            method="POST"
                            action="{{ route('penjualan.destroy', $penjualan->id) }}"
                            onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-batal-transaksi">
                                Batal Transaksi
                            </button>
                        </form>
                    @endcan

                </div>

            </div>

        @else

            {{-- ====================================================
                 MODE COMPLETED: READ-ONLY
            ==================================================== --}}
            <h4 style="color:#624451; margin-bottom:15px;">
                <i class="bi bi-cart"></i> Produk yang Dibeli
            </h4>

            <div class="table-wrapper">
                <table class="sale-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penjualan->itemPenjualan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->produk->nama ?? '-' }}</td>
                                <td>{{ $item->kuantitas }}</td>
                                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center; padding:30px;">
                                    Belum ada produk dalam transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- TOTAL & KEMBALIAN (KALAU CASH) --}}
            <div class="total-area">
                <div class="total-box">
                    <div>
                        <span>Total Pembayaran</span>
                    </div>

                    @if($penjualan->metode_pembayaran === 'CASH' && $penjualan->uang_diterima !== null)
                        <div>
                            <span>Uang Diterima</span>
                            <span>Rp {{ number_format($penjualan->uang_diterima, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span>Kembalian</span>
                            <span>Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="total">
                        <span>Total</span>
                        <span>Rp {{ number_format($penjualan->total_pembayaran ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

        @endif


        {{-- BUTTON BAWAH --}}
        <div class="button-area">

            <a href="{{ route('penjualan.index') }}" class="btn-kembali">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <button type="button" onclick="bukaStruk()" class="btn-cetak">
                <i class="bi bi-printer"></i>
                Cetak Struk
            </button>

        </div>

    </div>

</div>


{{-- =====================================================
     MODAL STRUK
===================================================== --}}

<div id="strukModal" class="struk-modal">

    <div class="struk-container">

        {{-- HEADER STRUK --}}
        <div class="struk-header">
            <h2>Yaya Mart</h2>
            <p>Terima Kasih Telah Berbelanja</p>
            <p>================================</p>
        </div>

        {{-- INFORMASI TRANSAKSI --}}
        <div class="struk-info">

            <div>
                <span>No. Transaksi</span>
                <span>#{{ $penjualan->id }}</span>
            </div>

            <div>
                <span>Status</span>
                <span>{{ $penjualan->status }}</span>
            </div>

            <div>
                <span>Pembayaran</span>
                <span>{{ $penjualan->metode_pembayaran ?? '-' }}</span>
            </div>

        </div>

        <div class="struk-line"></div>

        {{-- PRODUK --}}
        <div class="struk-produk">

            @forelse($penjualan->itemPenjualan as $item)

                <div class="struk-item">

                    <div class="struk-item-name">
                        {{ $item->produk->nama ?? '-' }}
                    </div>

                    <div class="struk-item-detail">
                        <span>{{ $item->kuantitas }} x</span>
                        <span>
                            Rp {{ number_format(
                                $item->subtotal / max($item->kuantitas, 1),
                                0,
                                ',',
                                '.'
                            ) }}
                        </span>
                    </div>

                    <div class="struk-item-detail">
                        <span>Subtotal</span>
                        <span>
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </span>
                    </div>

                </div>

            @empty

                <div style="text-align:center;">
                    Tidak ada produk.
                </div>

            @endforelse

        </div>

        <div class="struk-line"></div>

        {{-- TOTAL --}}
        <div class="struk-total">
            <div>
                <span>Total</span>
                <span class="grand-total">
                    Rp {{ number_format($penjualan->total_pembayaran ?? 0, 0, ',', '.') }}
                </span>
            </div>

            @if($penjualan->metode_pembayaran === 'CASH' && $penjualan->uang_diterima !== null)
                <div>
                    <span>Tunai</span>
                    <span>Rp {{ number_format($penjualan->uang_diterima, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span>Kembalian</span>
                    <span>Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</span>
                </div>
            @endif
        </div>

        <div class="struk-line"></div>

        {{-- FOOTER --}}
        <div class="struk-footer">
            <strong>TERIMA KASIH</strong>
            <br>
            Barang yang sudah dibeli
            tidak dapat dikembalikan.
            <br><br>
            Simpan struk ini sebagai
            bukti pembayaran.
        </div>

        {{-- BUTTON STRUK --}}
        <div class="struk-buttons">

            <button type="button" class="btn-print-struk" onclick="cetakStruk()">
                <i class="bi bi-printer"></i>
                Cetak Struk
            </button>

            <button type="button" class="btn-tutup-struk" onclick="tutupStruk()">
                Tutup
            </button>

        </div>

    </div>

</div>


{{-- =====================================================
     JAVASCRIPT
===================================================== --}}

<script>
const totalPembayaran = {{ $penjualan->total_pembayaran ?? 0 }};

function bukaStruk() {
    document.getElementById('strukModal').classList.add('active');
}

function tutupStruk() {
    document.getElementById('strukModal').classList.remove('active');
}

function cetakStruk() {
    window.print();
}

document.getElementById('strukModal').addEventListener('click', function(event) {
    if (event.target === this) {
        tutupStruk();
    }
});

function toggleQrisBarcode() {
    const method = document.getElementById('paymentMethod').value;
    const box = document.getElementById('qrisBarcodeBox');

    if (method === 'QRIS') {
        box.classList.add('show');
    } else {
        box.classList.remove('show');
    }
}

function toggleCashInput() {
    const method = document.getElementById('paymentMethod').value;
    const box = document.getElementById('cashInputBox');

    if (method === 'CASH') {
        box.classList.add('show');
    } else {
        box.classList.remove('show');
        document.getElementById('uangDiterima').value = '';
        document.getElementById('kembalianText').textContent = 'Rp 0';
        document.getElementById('kembalianText').classList.remove('kurang');
    }
}

function hitungKembalian() {
    const uang = parseFloat(document.getElementById('uangDiterima').value) || 0;
    const kembalian = uang - totalPembayaran;
    const el = document.getElementById('kembalianText');

    const formatted = new Intl.NumberFormat('id-ID').format(Math.abs(kembalian));

    if (kembalian < 0) {
        el.textContent = 'Kurang Rp ' + formatted;
        el.classList.add('kurang');
    } else {
        el.textContent = 'Rp ' + formatted;
        el.classList.remove('kurang');
    }
}

function konfirmasiBayar() {
    const method = document.getElementById('paymentMethod').value;

    if (method === 'CASH') {
        const uang = parseFloat(document.getElementById('uangDiterima').value) || 0;

        if (uang < totalPembayaran) {
            alert('Uang diterima kurang dari total pembayaran');
            return false;
        }
    }

    return confirm('Yakin ingin menyelesaikan pembayaran?');
}
</script>

@endsection