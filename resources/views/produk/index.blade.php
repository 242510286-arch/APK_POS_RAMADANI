@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<style>
    .produk-page {
        max-width: 1160px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }

    /* HEADER */
    .produk-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .produk-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #17233c;
        font-size: 32px;
        font-weight: 700;
    }

    .produk-title-icon {
        color: #d86d91;
        font-size: 34px;
    }

    .produk-subtitle {
        margin-top: 5px;
        margin-bottom: 0;
        color: #777;
        font-size: 15px;
    }

    /* TOMBOL TAMBAH */
    .btn-tambah-produk {
        background: #d86d91;
        border: none;
        color: white;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(216, 109, 145, 0.18);
    }

    .btn-tambah-produk:hover {
        background: #c95d81;
        color: white;
    }

    /* SEARCH */
    .produk-search-box {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        padding: 14px;
        margin-bottom: 20px;
    }

    .produk-search {
        display: flex;
        gap: 10px;
    }

    .produk-search input {
        height: 42px;
        border: 1px solid #ddd;
        border-radius: 9px;
        padding: 0 13px;
        flex: 1;
    }

    .produk-search input:focus {
        outline: none;
        border-color: #d86d91;
        box-shadow: 0 0 0 3px rgba(216, 109, 145, 0.10);
    }

    .btn-search-produk {
        height: 42px;
        background: #d86d91;
        border: none;
        color: white;
        padding: 0 20px;
        border-radius: 9px;
        font-weight: 600;
    }

    .btn-search-produk:hover {
        background: #c95d81;
        color: white;
    }

    /* TABLE CARD */
    .produk-table-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    }

    .produk-table {
        width: 100%;
        margin: 0;
    }

    .produk-table thead th {
        background: #fff5f8;
        color: #17233c;
        padding: 14px 12px;
        border-bottom: 1px solid #f1d7e1;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
    }

    .produk-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f0eeee;
        color: #17233c;
    }

    .produk-table tbody tr:last-child td {
        border-bottom: none;
    }

    .produk-table tbody tr:hover {
        background: #fffafb;
    }

    /* KOLOM */
    .produk-no {
        width: 55px;
        text-align: center;
    }

    .produk-user {
        width: 170px;
    }

    .produk-foto {
        width: 140px;
        text-align: center;
    }

    .produk-nama {
        width: 180px;
        font-weight: 600;
    }

    /* JENIS */
    .produk-jenis {
        width: 120px;
        text-align: center;
    }

    .jenis-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 20px;
        background: #fbe6f0;
        color: #d14f82;
        font-weight: 600;
        font-size: 13px;
        white-space: nowrap;
    }

    .produk-harga {
        width: 120px;
        white-space: nowrap;
    }

    .produk-stok {
        width: 80px;
        text-align: center;
    }

    .produk-aksi {
        width: 130px;
        text-align: center;
        white-space: nowrap;
    }

    /* FOTO */
    .produk-image {
        width: 75px;
        height: 55px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e5e5;
    }

    /* STOK */
    .stok-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        padding: 6px 10px;
        border-radius: 20px;
        background: #fbe6f0;
        color: #d14f82;
        font-weight: 600;
        font-size: 13px;
    }

    /* AKSI */
    .aksi-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .btn-edit-produk {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fff3cd;
        color: #c78a00;
        border: none;
        border-radius: 9px;
    }

    .btn-edit-produk:hover {
        background: #ffe8a1;
        color: #a96f00;
    }

    .btn-hapus-produk {
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

    .btn-hapus-produk:hover {
        background: #f8caca;
        color: #c82333;
    }

    /* PAGINATION */
    .produk-pagination {
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {

        .produk-page {
            max-width: 95%;
        }

    }

    @media (max-width: 768px) {

        .produk-header {
            flex-direction: column;
            gap: 15px;
        }

        .btn-tambah-produk {
            width: 100%;
        }

        .produk-title {
            font-size: 27px;
        }

        .produk-search {
            flex-direction: column;
        }

        .btn-search-produk {
            width: 100%;
        }

    }
</style>


<div class="produk-page">

    {{-- HEADER --}}
    <div class="produk-header">

        <div>

            <h1 class="produk-title">
                <span class="produk-title-icon"></span>
                Halaman Produk
            </h1>

            <p class="produk-subtitle">
                Kelola data produk dan stok barang
            </p>

        </div>


        <a
            href="{{ route('produk.create') }}"
            class="btn btn-tambah-produk"
        >
            + Tambah Produk
        </a>

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- SEARCH --}}
    <div class="produk-search-box">

        <form
            action="{{ route('produk.index') }}"
            method="GET"
        >

            <div class="produk-search">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama produk..."
                >

                <button
                    type="submit"
                    class="btn-search-produk"
                >
                    🔍 Search
                </button>

            </div>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="produk-table-card">

        <div class="table-responsive">

            <table class="table produk-table">

                <thead>

                    <tr>

                        <th class="produk-no">
                            #
                        </th>

                        <th class="produk-user">
                            User
                        </th>

                        <th class="produk-foto">
                            Foto
                        </th>

                        <th class="produk-nama">
                            Nama Produk
                        </th>

                        <th class="produk-jenis">
                            Jenis
                        </th>

                        <th class="produk-harga">
                            Harga Beli
                        </th>

                        <th class="produk-harga">
                            Harga Jual
                        </th>

                        <th class="produk-stok">
                            Stok
                        </th>

                        <th class="produk-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($products as $product)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="produk-no">

                                {{ $products->firstItem() + $loop->index }}

                            </td>


                            {{-- USER --}}
                            <td class="produk-user">

                                👤

                                {{ $product->user->name ?? '-' }}

                            </td>


                            {{-- FOTO --}}
                            <td class="produk-foto">

                                @if($product->foto)

                                    <img
                                        src="{{ asset('storage/' . $product->foto) }}"
                                        alt="{{ $product->nama }}"
                                        class="produk-image"
                                    >

                                @else

                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>


                            {{-- NAMA --}}
                            <td class="produk-nama">

                                {{ $product->nama }}

                            </td>


                            {{-- JENIS --}}
                            <td class="produk-jenis">

                                @if($product->jenis)

                                    <span class="jenis-badge">

                                        {{ $product->jenis->nama_jenis }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- HARGA BELI --}}
                            <td class="produk-harga">

                                Rp
                                {{ number_format($product->harga_beli, 0, ',', '.') }}

                            </td>


                            {{-- HARGA JUAL --}}
                            <td class="produk-harga">

                                Rp
                                {{ number_format($product->harga_jual, 0, ',', '.') }}

                            </td>


                            {{-- STOK --}}
                            <td class="produk-stok">

                                <span class="stok-badge">

                                    {{ $product->stok }}

                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td class="produk-aksi">

                                <div class="aksi-wrapper">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('produk.edit', $product->id) }}"
                                        class="btn btn-edit-produk"
                                        title="Edit"
                                    >
                                        ✏️
                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('produk.destroy', $product->id) }}"
                                        method="POST"
                                        style="margin: 0;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-hapus-produk"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                        >
                                            🗑️
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="9"
                                class="text-center py-5"
                            >
                                Belum ada produk.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($products->hasPages())

            <div class="produk-pagination">

                {{ $products->links() }}

            </div>

        @endif

    </div>

</div>

@endsection