@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

<style>
    .penjualan-page {
        max-width: 1160px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }

    /* HEADER */
    .penjualan-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .penjualan-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #17233c;
        font-size: 32px;
        font-weight: 700;
    }

    .penjualan-subtitle {
        margin-top: 5px;
        margin-bottom: 0;
        color: #777;
        font-size: 15px;
    }

    /* SEARCH */
    .penjualan-search-box {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        padding: 14px;
        margin-bottom: 20px;
    }

    .penjualan-search {
        display: flex;
        gap: 10px;
    }

    .penjualan-search input {
        height: 42px;
        width: 175px;
        border: 1px solid #ddd;
        border-radius: 9px;
        padding: 0 13px;
    }

    .penjualan-search input:focus {
        outline: none;
        border-color: #d86d91;
        box-shadow: 0 0 0 3px rgba(216, 109, 145, 0.10);
    }

    .btn-search-penjualan {
        height: 42px;
        background: #d86d91;
        border: none;
        color: white;
        padding: 0 20px;
        border-radius: 9px;
        font-weight: 600;
    }

    .btn-search-penjualan:hover {
        background: #c95d81;
        color: white;
    }

    /* TABLE */
    .penjualan-table-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    }

    .penjualan-table {
        width: 100%;
        margin: 0;
    }

    .penjualan-table thead th {
        background: #fff5f8;
        color: #17233c;
        padding: 14px 12px;
        border-bottom: 1px solid #f1d7e1;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
    }

    .penjualan-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f0eeee;
        color: #17233c;
    }

    .penjualan-table tbody tr:last-child td {
        border-bottom: none;
    }

    .penjualan-table tbody tr:hover {
        background: #fffafb;
    }

    /* KOLOM */
    .penjualan-no {
        width: 55px;
        text-align: center;
    }

    .penjualan-tanggal {
        width: 170px;
        white-space: nowrap;
    }

    .penjualan-kasir {
        width: 210px;
        white-space: nowrap;
    }

    .penjualan-total {
        width: 150px;
        white-space: nowrap;
        color: #df6288 !important;
        font-weight: 700;
    }

    .penjualan-metode {
        width: 150px;
        text-align: center;
    }

    .penjualan-status {
        width: 150px;
        text-align: center;
    }

    .penjualan-aksi {
        width: 130px;
        text-align: center;
        white-space: nowrap;
    }

    /* BADGE METODE */
    .metode-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .metode-cash {
        background: #dff8e8;
        color: #168447;
    }

    .metode-transfer {
        background: #dceaff;
        color: #245bc7;
    }

    .metode-qris {
        background: #f0e1ff;
        color: #803bc2;
    }

    /* BADGE STATUS */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 13px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-completed {
        background: #d9f8e4;
        color: #168447;
    }

    .status-open {
        background: #fff0c7;
        color: #b56b00;
    }

    /* AKSI */
    .aksi-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .btn-detail-penjualan {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #dceaff;
        color: #2463d4;
        border: none;
        border-radius: 9px;
    }

    .btn-detail-penjualan:hover {
        background: #c9ddff;
        color: #1452bd;
    }

    .btn-hapus-penjualan {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fde2e2;
        color: #dc3545;
        border: none;
        border-radius: 9px;
    }

    .btn-hapus-penjualan:hover {
        background: #f8caca;
        color: #c82333;
    }

    /* PAGINATION */
    .penjualan-pagination {
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .penjualan-page {
            max-width: 95%;
        }
    }

    @media (max-width: 768px) {

        .penjualan-title {
            font-size: 27px;
        }

        .penjualan-search {
            flex-direction: column;
        }

        .penjualan-search input,
        .btn-search-penjualan {
            width: 100%;
        }
    }
</style>


<div class="penjualan-page">

    {{-- HEADER --}}
    <div class="penjualan-header">

        <div>

            <h1 class="penjualan-title">
                🛒 Halaman Penjualan
            </h1>

            <p class="penjualan-subtitle">
                Kelola transaksi dan pembayaran penjualan
            </p>

        </div>

    </div>


    {{-- SEARCH --}}
    <div class="penjualan-search-box">

        <form action="{{ route('penjualan.index') }}"
              method="GET">

            <div class="penjualan-search">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama kasir...">

                <button type="submit"
                        class="btn-search-penjualan">

                    🔍 Search

                </button>

            </div>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="penjualan-table-card">

        <div class="table-responsive">

            <table class="table penjualan-table">

                <thead>

                    <tr>

                        <th class="penjualan-no">#</th>

                        <th class="penjualan-tanggal">
                            Tanggal Transaksi
                        </th>

                        <th class="penjualan-kasir">
                            Kasir
                        </th>

                        <th class="penjualan-total">
                            Total Pembayaran
                        </th>

                        <th class="penjualan-metode">
                            Metode Pembayaran
                        </th>

                        <th class="penjualan-status">
                            Status
                        </th>

                        <th class="penjualan-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($sales as $sale)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="penjualan-no">
                                {{ $sales->firstItem() + $loop->index }}
                            </td>


                            {{-- TANGGAL --}}
                            <td class="penjualan-tanggal">

                                📅
                                {{ $sale->created_at->format('d-m-Y H:i:s') }}

                            </td>


                            {{-- KASIR --}}
                            <td class="penjualan-kasir">

                                👤
                                <strong>
                                    {{ $sale->user->name ?? '-' }}
                                </strong>

                            </td>


                            {{-- TOTAL --}}
                            <td class="penjualan-total">

                                Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}

                            </td>


                            {{-- METODE --}}
                            <td class="penjualan-metode">

                                @if($sale->metode_pembayaran == 'CASH')

                                    <span class="metode-badge metode-cash">
                                        💵 CASH
                                    </span>

                                @elseif($sale->metode_pembayaran == 'TRANSFER')

                                    <span class="metode-badge metode-transfer">
                                        🏦 TRANSFER
                                    </span>

                                @elseif($sale->metode_pembayaran == 'QRIS')

                                    <span class="metode-badge metode-qris">
                                        ▦ QRIS
                                    </span>

                                @else

                                    <span class="metode-badge">
                                        {{ $sale->metode_pembayaran }}
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td class="penjualan-status">

                                @if($sale->status == 'COMPLETED')

                                    <span class="status-badge status-completed">
                                        ● COMPLETED
                                    </span>

                                @else

                                    <span class="status-badge status-open">
                                        ● OPEN
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="penjualan-aksi">

                                <div class="aksi-wrapper">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('penjualan.show', $sale->id) }}"
                                       class="btn btn-detail-penjualan"
                                       title="Detail">

                                        👁️

                                    </a>


                                    {{-- HAPUS --}}
                                    @if($sale->status == 'OPEN')

                                        <form action="{{ route('penjualan.destroy', $sale->id) }}"
                                              method="POST"
                                              style="margin: 0;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-hapus-penjualan"
                                                    title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus transaksi ini?')">

                                                🗑️

                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                Belum ada transaksi penjualan.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($sales->hasPages())

            <div class="penjualan-pagination">

                {{ $sales->links() }}

            </div>

        @endif

    </div>

</div>

@endsection