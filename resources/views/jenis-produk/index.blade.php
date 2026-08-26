@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

<style>
    .jenis-page {
        max-width: 1160px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }

    /* HEADER */
    .jenis-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .jenis-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #17233c;
        font-size: 32px;
        font-weight: 700;
    }

    .jenis-subtitle {
        margin-top: 5px;
        margin-bottom: 0;
        color: #777;
        font-size: 15px;
    }

    /* TOMBOL TAMBAH */
    .btn-tambah-jenis {
        background: #d86d91;
        border: none;
        color: white;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(216, 109, 145, 0.18);
    }

    .btn-tambah-jenis:hover {
        background: #c95d81;
        color: white;
    }

    /* TABLE CARD */
    .jenis-table-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    }

    .jenis-table {
        width: 100%;
        margin: 0;
    }

    .jenis-table thead th {
        background: #fff5f8;
        color: #17233c;
        padding: 14px 12px;
        border-bottom: 1px solid #f1d7e1;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
    }

    .jenis-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f0eeee;
        color: #17233c;
    }

    .jenis-table tbody tr:last-child td {
        border-bottom: none;
    }

    .jenis-table tbody tr:hover {
        background: #fffafb;
    }

    /* KOLOM */
    .jenis-no {
        width: 70px;
        text-align: center;
    }

    .jenis-nama {
        width: 300px;
        font-weight: 600;
    }

    .jenis-aksi {
        width: 220px;
        text-align: center;
        white-space: nowrap;
    }

    /* AKSI */
    .jenis-aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit-jenis {
        background: #fff1c9;
        color: #c98200;
        border: none;
        border-radius: 9px;
        padding: 8px 14px;
        font-weight: 600;
    }

    .btn-edit-jenis:hover {
        background: #ffe5a1;
        color: #a96d00;
    }

    .btn-hapus-jenis {
        background: #fde2e2;
        color: #dc3545;
        border: none;
        border-radius: 9px;
        padding: 8px 14px;
        font-weight: 600;
    }

    .btn-hapus-jenis:hover {
        background: #f8caca;
        color: #c82333;
    }

    /* PAGINATION */
    .jenis-pagination {
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .jenis-page {
            max-width: 95%;
        }
    }

    @media (max-width: 768px) {

        .jenis-header {
            flex-direction: column;
            gap: 15px;
        }

        .btn-tambah-jenis {
            width: 100%;
        }

        .jenis-title {
            font-size: 27px;
        }
    }
</style>


<div class="jenis-page">

    {{-- HEADER --}}
    <div class="jenis-header">

        <div>

            <h1 class="jenis-title">
                🏷️ Halaman Jenis Produk
            </h1>

            <p class="jenis-subtitle">
                Kelola jenis atau kategori produk
            </p>

        </div>


        <a href="{{ route('jenis-produk.create') }}"
           class="btn btn-tambah-jenis">

            + Tambah Jenis Produk

        </a>

    </div>


    {{-- TABLE --}}
    <div class="jenis-table-card">

        <div class="table-responsive">

            <table class="table jenis-table">

                <thead>

                    <tr>

                        <th class="jenis-no">
                            #
                        </th>

                        <th class="jenis-nama">
                            Nama Jenis Produk
                        </th>

                        <th class="jenis-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($jenisProduks as $jenis)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="jenis-no">

                                {{ $loop->iteration }}

                            </td>


                            {{-- NAMA --}}
                            <td class="jenis-nama">

                                {{ $jenis->nama_jenis }}

                            </td>


                            {{-- AKSI --}}
                            <td class="jenis-aksi">

                                <div class="jenis-aksi-wrapper">

                                    {{-- EDIT --}}
                                    <a href="{{ route('jenis-produk.edit', $jenis->id) }}"
                                       class="btn btn-edit-jenis">

                                        ✏️ Edit

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('jenis-produk.destroy', $jenis->id) }}"
                                          method="POST"
                                          style="margin: 0;">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-hapus-jenis"
                                                onclick="return confirm('Yakin ingin menghapus jenis produk ini?')">

                                            🗑️ Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3"
                                class="text-center py-5">

                                Belum ada jenis produk.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if(method_exists($jenisProduks, 'hasPages') && $jenisProduks->hasPages())

            <div class="jenis-pagination">

                {{ $jenisProduks->links() }}

            </div>

        @endif

    </div>

</div>

@endsection