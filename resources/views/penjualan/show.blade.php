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
    max-width: 1000px;
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


/* =========================================
   ISI STRUK
========================================= */

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


/* HEADER STRUK */

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


/* GARIS */

.struk-line {
    border-top: 1px dashed #333;
    margin: 12px 0;
}


/* INFORMASI */

.struk-info {
    font-size: 12px;
    line-height: 1.6;
}

.struk-info div {
    display: flex;
    justify-content: space-between;
}


/* PRODUK */

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


/* TOTAL */

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


/* FOOTER */

.struk-footer {
    text-align: center;
    margin-top: 18px;
    font-size: 12px;
    line-height: 1.5;
}


/* BUTTON MODAL */

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


        {{-- INFORMASI TRANSAKSI --}}
        <div class="info-grid">

            <div class="info-box">
                <small>ID Transaksi</small>

                <strong>
                    #{{ $penjualan->id }}
                </strong>
            </div>


            <div class="info-box">

                <small>Status</small>

                <span class="status">
                    {{ $penjualan->status }}
                </span>

            </div>


            <div class="info-box">

                <small>Metode Pembayaran</small>

                <strong>
                    {{ $penjualan->metode_pembayaran ?? '-' }}
                </strong>

            </div>

        </div>


        {{-- DAFTAR PRODUK --}}
        <h4 style="color:#624451; margin-bottom:15px;">

            <i class="bi bi-cart"></i>

            Produk yang Dibeli

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

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->produk->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $item->kuantitas }}
                        </td>

                        <td>
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>

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


        {{-- TOTAL --}}
        <div class="total-area">

            <div class="total-box">

                <div>

                    <span>
                        Total Pembayaran
                    </span>

                </div>

                <div class="total">

                    <span>
                        Total
                    </span>

                    <span>
                        Rp {{ number_format($penjualan->total_pembayaran ?? 0, 0, ',', '.') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
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

                <span>
                    #{{ $penjualan->id }}
                </span>

            </div>


            <div>

                <span>Status</span>

                <span>
                    {{ $penjualan->status }}
                </span>

            </div>


            <div>

                <span>Pembayaran</span>

                <span>
                    {{ $penjualan->metode_pembayaran ?? '-' }}
                </span>

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

                    <span>
                        {{ $item->kuantitas }} x
                    </span>

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

                    <span>
                        Subtotal
                    </span>

                    <span>
                        Rp {{ number_format(
                            $item->subtotal,
                            0,
                            ',',
                            '.'
                        ) }}
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

                <span>
                    Total
                </span>

                <span class="grand-total">

                    Rp {{ number_format(
                        $penjualan->total_pembayaran ?? 0,
                        0,
                        ',',
                        '.'
                    ) }}

                </span>

            </div>

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
function bukaStruk() {

    document.getElementById('strukModal').classList.add('active');

}


function tutupStruk() {

    document.getElementById('strukModal').classList.remove('active');

}


function cetakStruk() {

    window.print();

}


/* Klik area luar modal untuk menutup */

document.getElementById('strukModal').addEventListener('click', function(event) {

    if (event.target === this) {

        tutupStruk();

    }

});
</script>


@endsection