@extends('layouts.app')

@section('title', 'Tambah Jenis Produk')

@section('content')

<style>
    .jenis-form-wrapper {
        padding: 25px 5px;
    }

    .jenis-form-header {
        margin-bottom: 25px;
    }

    .jenis-form-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #17233c;
        font-weight: 700;
        font-size: 32px;
        margin-bottom: 5px;
    }

    .jenis-form-subtitle {
        color: #666;
        margin: 0;
    }

    .jenis-form-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        max-width: 700px;
    }

    .jenis-form-card .form-label {
        color: #17233c;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .jenis-form-card .form-control {
        border: 1px solid #ddd;
        border-radius: 9px;
        padding: 11px 13px;
    }

    .jenis-form-card .form-control:focus {
        border-color: #d86d91;
        box-shadow: 0 0 0 0.2rem rgba(216, 109, 145, 0.15);
    }

    .btn-simpan {
        background: #d86d91;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 9px;
        font-weight: 600;
    }

    .btn-simpan:hover {
        background: #c95d81;
        color: white;
    }

    .btn-kembali {
        background: #f1f1f1;
        border: none;
        color: #555;
        padding: 10px 20px;
        border-radius: 9px;
        font-weight: 600;
    }

    .btn-kembali:hover {
        background: #e3e3e3;
        color: #333;
    }

    @media (max-width: 768px) {

        .jenis-form-title {
            font-size: 27px;
        }

        .jenis-form-card {
            padding: 20px;
        }

    }
</style>


<div class="container-fluid jenis-form-wrapper">

    {{-- HEADER --}}
    <div class="jenis-form-header">

        <h1 class="jenis-form-title">
            🏷️ Tambah Jenis Produk
        </h1>

        <p class="jenis-form-subtitle">
            Tambahkan jenis atau kategori produk baru
        </p>

    </div>


    {{-- FORM CARD --}}
    <div class="jenis-form-card">

        <form action="{{ route('jenis-produk.store') }}"
              method="POST">

            @csrf


            {{-- NAMA JENIS --}}
            <div class="mb-4">

                <label for="nama_jenis"
                       class="form-label">

                    Nama Jenis Produk

                </label>

                <input type="text"
                       id="nama_jenis"
                       name="nama_jenis"
                       class="form-control @error('nama_jenis') is-invalid @enderror"
                       value="{{ old('nama_jenis') }}"
                       placeholder="Contoh: Makanan"
                       autofocus>

                @error('nama_jenis')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="d-flex gap-2">

                <a href="{{ route('jenis-produk.index') }}"
                   class="btn btn-kembali">

                    ← Kembali

                </a>

                <button type="submit"
                        class="btn btn-simpan">

                    💾 Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection