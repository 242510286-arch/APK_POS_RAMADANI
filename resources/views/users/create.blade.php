@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<style>
    .user-form-page {
        max-width: 800px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }

    .user-form-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    }

    .user-form-title {
        color: #17233c;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .form-label {
        color: #17233c;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1px solid #ddd;
        border-radius: 9px;
        padding: 11px 13px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #d86d91;
        box-shadow: 0 0 0 0.15rem rgba(216, 109, 145, 0.15);
    }

    .btn-simpan {
        background: #d86d91;
        color: white;
        border: none;
        border-radius: 9px;
        padding: 10px 20px;
        font-weight: 600;
    }

    .btn-simpan:hover {
        background: #c95d81;
        color: white;
    }
</style>


<div class="user-form-page">

    <div class="user-form-card">

        <h1 class="user-form-title">
            👤 Tambah User
        </h1>


        <form action="{{ route('admin.users.store') }}"
              method="POST">

            @csrf


            {{-- NAMA --}}
            <div class="mb-3">

                <label class="form-label">
                    Nama User
                </label>

                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama user"
                       required>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- EMAIL --}}
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- PASSWORD --}}
            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Masukkan password"
                       required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- ROLE --}}
            <div class="mb-4">

                <label class="form-label">
                    Role
                </label>

                <select name="role_id"
                        class="form-select @error('role_id') is-invalid @enderror"
                        required>

                    <option value="">
                        -- Pilih Role --
                    </option>

                    @foreach($roles as $role)

                        <option value="{{ $role->id }}"
                            {{ old('role_id') == $role->id ? 'selected' : '' }}>

                            {{ $role->name }}

                        </option>

                    @endforeach

                </select>

                @error('role_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- TOMBOL --}}
            <a href="{{ route('admin.users') }}"
               class="btn btn-secondary">

                Kembali

            </a>

            <button type="submit"
                    class="btn btn-simpan">

                Simpan User

            </button>

        </form>

    </div>

</div>

@endsection
