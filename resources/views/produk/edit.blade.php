@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<style>
    .produk-page {
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #fff0f5, #fde7ef);
        padding: 40px 20px;
    }

    .produk-card {
        max-width: 1000px;
        margin: auto;
        background: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 15px 40px rgba(190, 80, 120, 0.12);
    }

    .produk-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
    }

    .produk-icon {
        width: 50px;
        height: 50px;
        background: #df638d;
        color: white;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .produk-header h2 {
        margin: 0;
        color: #44303a;
        font-size: 25px;
        font-weight: 700;
    }

    .produk-header p {
        margin: 3px 0 0;
        color: #b18a9a;
        font-size: 13px;
    }

    .produk-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #624451;
        font-size: 14px;
        font-weight: 600;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #f0cbd9;
        border-radius: 11px;
        background: #fffafd;
        color: #624451;
        outline: none;
        transition: 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #df638d;
        box-shadow: 0 0 0 3px rgba(223, 99, 141, 0.12);
    }

    .file-input {
        padding: 9px !important;
    }

    .preview-title {
        color: #624451;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .preview-box {
        height: 220px;
        border: 2px dashed #efb7cb;
        border-radius: 18px;
        background: #fffafd;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .preview-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .preview-empty {
        text-align: center;
        color: #c995a9;
    }

    .preview-empty i {
        font-size: 38px;
        display: block;
        margin-bottom: 8px;
    }

    .button-area {
        margin-top: 28px;
        padding-top: 18px;
        border-top: 1px solid #f2d7e1;
        display: flex;
        gap: 10px;
    }

    .btn-simpan {
        border: none;
        background: #df638d;
        color: white;
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-simpan:hover {
        background: #d65380;
    }

    .btn-kembali {
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

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .produk-grid {
            grid-template-columns: 1fr;
        }

        .produk-card {
            padding: 22px;
        }
    }
</style>


<div class="produk-page">

    <div class="produk-card">

        {{-- HEADER --}}
        <div class="produk-header">

            <div class="produk-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h2>Edit Produk</h2>
                <p>Perbarui data produk dalam sistem POS</p>
            </div>

        </div>


        {{-- FORM --}}
        <form action="{{ route('produk.update', $produk) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="produk-grid">

                {{-- BAGIAN KIRI --}}
                <div>

                    {{-- FOTO --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-image"></i>
                            Gambar Produk
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="file-input"
                            accept="image/*"
                            onchange="previewFoto(event)"
                        >

                        @error('gambar')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NAMA PRODUK --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-tag"></i>
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            value="{{ old('nama_produk', $produk->nama) }}"
                            placeholder="Masukkan nama produk"
                            required
                        >

                        @error('nama_produk')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JENIS PRODUK --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-list"></i>
                            Jenis
                        </label>

                        <select
                            name="jenis_id"
                            id="jenis_id"
                            required
                        >

                            <option value="">
                                Pilih Jenis
                            </option>

                            @foreach($jenis as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('jenis_id', $produk->jenis_id) == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_jenis }}
                                </option>

                            @endforeach

                        </select>

                        @error('jenis_id')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- HARGA BELI --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-cash"></i>
                            Harga Beli
                        </label>

                        <input
                            type="number"
                            name="harga_beli"
                            value="{{ old('harga_beli', $produk->harga_beli) }}"
                            placeholder="Masukkan harga beli"
                            required
                        >

                        @error('harga_beli')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- HARGA JUAL --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-tags"></i>
                            Harga Jual
                        </label>

                        <input
                            type="number"
                            name="harga_jual"
                            value="{{ old('harga_jual', $produk->harga_jual) }}"
                            placeholder="Masukkan harga jual"
                            required
                        >

                        @error('harga_jual')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- STOK --}}
                    <div class="form-group">

                        <label>
                            <i class="bi bi-boxes"></i>
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="{{ old('stok', $produk->stok) }}"
                            placeholder="Masukkan jumlah stok"
                            required
                        >

                        @error('stok')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- BAGIAN KANAN --}}
                <div>

                    <div class="preview-title">
                        <i class="bi bi-camera"></i>
                        Preview Foto
                    </div>

                    <div class="preview-box">

                        @if($produk->foto)

                            <img
                                id="preview"
                                src="{{ asset('storage/' . $produk->foto) }}"
                                alt="{{ $produk->nama }}"
                            >

                        @else

                            <div
                                class="preview-empty"
                                id="emptyPreview"
                            >
                                <i class="bi bi-image"></i>
                                Belum ada foto
                            </div>

                            <img
                                id="preview"
                                style="display:none;"
                                alt="Preview"
                            >

                        @endif

                    </div>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="button-area">

                <button
                    type="submit"
                    class="btn-simpan"
                >
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('produk.index') }}"
                    class="btn-kembali"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>


<script>

function previewFoto(event) {

    const input = event.target;
    const preview = document.getElementById('preview');
    const emptyPreview = document.getElementById('emptyPreview');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;
            preview.style.display = 'block';

            if (emptyPreview) {
                emptyPreview.style.display = 'none';
            }

        };

        reader.readAsDataURL(input.files[0]);
    }

}

</script>

@endsection