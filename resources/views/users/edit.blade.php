@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<style>
    .user-page {
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #fff0f5, #fde7ef);
        padding: 40px 20px;
    }

    .user-card {
        max-width: 850px;
        margin: auto;
        background: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 15px 40px rgba(190, 80, 120, 0.12);
    }

    .user-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .user-icon {
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

    .user-header h2 {
        margin: 0;
        color: #44303a;
        font-size: 25px;
        font-weight: 700;
    }

    .user-header p {
        margin: 3px 0 0;
        color: #b18a9a;
        font-size: 13px;
    }

    .form-group {
        margin-bottom: 20px;
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
        font-size: 14px;
        transition: 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #df638d;
        box-shadow: 0 0 0 3px rgba(223, 99, 141, 0.12);
    }

    .form-group input::placeholder {
        color: #c9a6b5;
    }

    .password-info {
        margin-top: 6px;
        color: #b18a9a;
        font-size: 12px;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .button-area {
        margin-top: 30px;
        padding-top: 20px;
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
        transition: 0.2s;
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
        transition: 0.2s;
    }

    .btn-kembali:hover {
        background: #fff4f8;
    }

    @media (max-width: 768px) {
        .user-card {
            padding: 22px;
        }
    }
</style>


<div class="user-page">

    <div class="user-card">

        {{-- HEADER --}}
        <div class="user-header">

            <div class="user-icon">
                <i class="bi bi-person-gear"></i>
            </div>

            <div>
                <h2>Edit User</h2>
                <p>Perbarui informasi pengguna dalam sistem POS</p>
            </div>

        </div>


        {{-- FORM --}}
        <form action="{{ route('admin.users.update', $user) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- NAMA --}}
            <div class="form-group">

                <label>
                    <i class="bi bi-person"></i>
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    placeholder="Masukkan nama user"
                >

                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- EMAIL --}}
            <div class="form-group">

                <label>
                    <i class="bi bi-envelope"></i>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    placeholder="Masukkan email"
                >

                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- PASSWORD --}}
            <div class="form-group">

                <label>
                    <i class="bi bi-lock"></i>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Kosongkan jika tidak ingin mengubah password"
                >

                <div class="password-info">
                    Kosongkan bagian ini jika password tidak ingin diubah.
                </div>

                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- ROLE --}}
            <div class="form-group">

                <label>
                    <i class="bi bi-person-badge"></i>
                    Role
                </label>

                <select name="role_id">

                    <option value="">-- Pilih Role --</option>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->id }}"
                            {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}
                        >
                            {{ ucfirst($role->name) }}
                        </option>

                    @endforeach

                </select>

                @error('role_id')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="button-area">

                <button type="submit" class="btn-simpan">
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ url('/admin/users') }}" class="btn-kembali">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection