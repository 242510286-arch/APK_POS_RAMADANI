@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<style>
    /* ========================================
       SOFT PINK DASHBOARD
    ======================================== */

    .dashboard-page {
        background: #fff7fa;
        min-height: calc(100vh - 70px);
        padding: 30px 0 50px;
        color: #4a3540;
    }

    /* Container */
    .dashboard-container {
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ========================================
       JUDUL
    ======================================== */

    .dashboard-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .dashboard-title h1 {
        font-size: 32px;
        font-weight: 700;
        color: #4a3540;
        margin-bottom: 5px;
    }

    .dashboard-title p {
        color: #9a7c88;
        margin: 0;
        font-size: 15px;
    }

    /* ========================================
       SECTION TITLE
    ======================================== */

    .section-title {
        text-align: center;
        font-size: 27px;
        font-weight: 700;
        color: #4a3540;
        margin: 35px 0 20px;
    }

    /* ========================================
       CARD
    ======================================== */

    .pink-card {
        background: #ffffff;
        border: 1px solid #f1d5df;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(215, 127, 154, 0.10);
        height: 100%;
        transition: all 0.2s ease;
    }

    .pink-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(215, 127, 154, 0.16);
    }

    .pink-card-header {
        background: #fcecf2;
        border-bottom: 1px solid #f1d5df;
        padding: 13px 18px;
        text-align: center;
        color: #694754;
        font-size: 15px;
        font-weight: 500;
    }

    .pink-card-body {
        padding: 22px 18px;
        text-align: center;
    }

    .pink-card-value {
        margin: 0;
        font-size: 23px;
        font-weight: 700;
        color: #c96d89;
    }

    /* ========================================
       INVENTORY CARD
    ======================================== */

    .inventory-box {
        background: #ffffff;
        border: 1px solid #f1d5df;
        border-radius: 16px;
        padding: 18px;
        height: 100%;
        box-shadow: 0 5px 18px rgba(215, 127, 154, 0.08);
    }

    .inventory-title {
        text-align: center;
        color: #694754;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* ========================================
       TABLE
    ======================================== */

    .pink-table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
        border: 1px solid #f1d5df;
        border-radius: 10px;
    }

    .pink-table thead th {
        background: #fcecf2;
        color: #694754;
        font-weight: 600;
        font-size: 14px;
        padding: 12px 14px;
        border: none;
    }

    .pink-table tbody td {
        background: #ffffff;
        color: #5a414b;
        padding: 12px 14px;
        border-top: 1px solid #f7e4ea;
        font-size: 14px;
        vertical-align: middle;
    }

    .pink-table tbody tr {
        transition: background 0.2s ease;
    }

    .pink-table tbody tr:hover td {
        background: #fff7fa;
    }

    .stock-badge {
        display: inline-block;
        min-width: 35px;
        padding: 4px 10px;
        border-radius: 20px;
        background: #fcecf2;
        color: #c96d89;
        font-weight: 600;
        text-align: center;
    }

    /* ========================================
       BEST SELLER
    ======================================== */

    .best-seller-box {
        background: #ffffff;
        border: 1px solid #f1d5df;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 5px 18px rgba(215, 127, 154, 0.08);
    }

    /* ========================================
       EMPTY DATA
    ======================================== */

    .empty-data {
        color: #9a7c88 !important;
        text-align: center;
        padding: 20px !important;
        font-style: italic;
    }

    /* ========================================
       PAGINATION
    ======================================== */

    .pagination {
        margin-top: 15px;
        justify-content: center;
    }

    .pagination .page-link {
        color: #c96d89;
        border-color: #f1d5df;
        background: #ffffff;
    }

    .pagination .page-link:hover {
        background: #fcecf2;
        color: #b85f7a;
    }

    .pagination .active .page-link {
        background: #d77f9a;
        border-color: #d77f9a;
        color: #ffffff;
    }

    /* ========================================
       RESPONSIVE
    ======================================== */

    @media (max-width: 768px) {

        .dashboard-page {
            padding-top: 20px;
        }

        .dashboard-title h1 {
            font-size: 26px;
        }

        .section-title {
            font-size: 23px;
        }

        .inventory-box {
            margin-bottom: 20px;
        }

        .pink-table {
            font-size: 13px;
        }

        .pink-table thead th,
        .pink-table tbody td {
            padding: 9px 8px;
        }
    }
</style>


<div class="dashboard-page">

    <div class="dashboard-container">

        {{-- ==========================================
             JUDUL DASHBOARD
        =========================================== --}}

        <div class="dashboard-title">
            <h1>Ringkasan Hari Ini</h1>
            <p>Dashboard Point of Sale</p>
        </div>


        {{-- ==========================================
             TODAY'S SALES
        =========================================== --}}

        <h2 class="section-title">
            Today's Sales
        </h2>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="pink-card">

                    <div class="pink-card-header">
                        Total Nilai Penjualan Hari Ini
                    </div>

                    <div class="pink-card-body">
                        <h5 class="pink-card-value">
                            Rp {{ number_format($ringkasan['total_penjualan']) }}
                        </h5>
                    </div>

                </div>
            </div>


            <div class="col-md-6">
                <div class="pink-card">

                    <div class="pink-card-header">
                        Jumlah Transaksi Hari Ini
                    </div>

                    <div class="pink-card-body">
                        <h5 class="pink-card-value">
                            Rp {{ number_format($ringkasan['total_penjualan']) }}
                        </h5>
                    </div>

                </div>
            </div>

        </div>


        {{-- ==========================================
             PAYMENT STATUS
        =========================================== --}}

        <h2 class="section-title">
            Cash & Payment Status
        </h2>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="pink-card">

                    <div class="pink-card-header">
                        Total Pembayaran Tunai
                    </div>

                    <div class="pink-card-body">
                        <h5 class="pink-card-value">
                            Rp {{ number_format($ringkasan['total_penjualan']) }}
                        </h5>
                    </div>

                </div>
            </div>


            <div class="col-md-6">
                <div class="pink-card">

                    <div class="pink-card-header">
                        Total Pembayaran Non-Tunai
                    </div>

                    <div class="pink-card-body">
                        <h5 class="pink-card-value">
                            Rp {{ number_format($ringkasan['total_penjualan']) }}
                        </h5>
                    </div>

                </div>
            </div>

        </div>


        {{-- ==========================================
             CRITICAL INVENTORY
        =========================================== --}}

        <h2 class="section-title">
            Critical Inventory Status
        </h2>

        <div class="row g-4">

            {{-- STOK RENDAH --}}
            <div class="col-md-6">

                <div class="inventory-box">

                    <h3 class="inventory-title">
                        Daftar Produk Stok Rendah
                    </h3>

                    <table class="pink-table">

                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>Nama</th>
                                <th width="20%">Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($produkStokRendah as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokRendah->firstItem() + $index }}
                                    </td>

                                    <td>
                                        {{ $produk->nama }}
                                    </td>

                                    <td>
                                        <span class="stock-badge">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="empty-data">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    {{ $produkStokRendah->links() }}

                </div>

            </div>


            {{-- PRODUK HABIS --}}
            <div class="col-md-6">

                <div class="inventory-box">

                    <h3 class="inventory-title">
                        Produk Habis Stok
                    </h3>

                    <table class="pink-table">

                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>Nama</th>
                                <th width="20%">Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($produkStokRendah as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokRendah->firstItem() + $index }}
                                    </td>

                                    <td>
                                        {{ $produk->nama }}
                                    </td>

                                    <td>
                                        <span class="stock-badge">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="empty-data">
                                        Tidak ada produk yang habis stok.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    {{ $produkStokRendah->links() }}

                </div>

            </div>

        </div>


        {{-- ==========================================
             BEST SELLER
        =========================================== --}}

        <h2 class="section-title">
            Best Seller Products
        </h2>

        <div class="best-seller-box">

            <table class="pink-table">

                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>Nama</th>
                        <th width="20%">Stok</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($produkStokRendah as $index => $produk)

                        <tr>

                            <td>
                                {{ $produkStokRendah->firstItem() + $index }}
                            </td>

                            <td>
                                {{ $produk->nama }}
                            </td>

                            <td>
                                <span class="stock-badge">
                                    {{ $produk->stok }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="empty-data">
                                Belum ada data produk.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection