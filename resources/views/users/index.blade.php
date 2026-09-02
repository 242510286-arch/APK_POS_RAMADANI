@extends('layouts.app')

@section('title', 'User')

@section('content')

@include('layouts.navbar')

<style>
    .user-page {
        max-width: 1160px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }

    /* HEADER */
    .user-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .user-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: #17233c;
        font-size: 32px;
        font-weight: 700;
    }

    .user-subtitle {
        margin-top: 5px;
        margin-bottom: 0;
        color: #777;
        font-size: 15px;
    }

    /* TOMBOL TAMBAH */
    .btn-tambah-user {
        background: #d86d91;
        border: none;
        color: white;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(216, 109, 145, 0.18);
    }

    .btn-tambah-user:hover {
        background: #c95d81;
        color: white;
    }

    /* SUCCESS */
    .user-alert {
        background: #dff7e7;
        border: 1px solid #b8e8c8;
        color: #198754;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 20px;
    }

    /* TABLE CARD */
    .user-table-card {
        background: white;
        border: 1px solid #f1d7e1;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
    }

    .user-table {
        width: 100%;
        margin: 0;
    }

    .user-table thead th {
        background: #fff5f8;
        color: #17233c;
        padding: 14px 12px;
        border-bottom: 1px solid #f1d7e1;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
    }

    .user-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f0eeee;
        color: #17233c;
    }

    .user-table tbody tr:last-child td {
        border-bottom: none;
    }

    .user-table tbody tr:hover {
        background: #fffafb;
    }

    /* KOLOM */
    .user-no {
        width: 70px;
        text-align: center;
    }

    .user-nama {
        font-weight: 600;
    }

    .user-role {
        width: 150px;
        text-align: center;
    }

    .user-aksi {
        width: 220px;
        text-align: center;
        white-space: nowrap;
    }

    /* BADGE ROLE */
    .badge-role {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    .badge-admin {
        background: #e8e5ff;
        color: #5548d9;
    }

    .badge-kasir {
        background: #dff7e7;
        color: #198754;
    }

    .badge-default {
        background: #eeeeee;
        color: #666666;
    }

    /* AKSI */
    .user-aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit-user {
        background: #fff1c9;
        color: #c98200;
        border: none;
        border-radius: 9px;
        padding: 8px 14px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-edit-user:hover {
        background: #ffe5a1;
        color: #a96d00;
    }

    .btn-hapus-user {
        background: #fde2e2;
        color: #dc3545;
        border: none;
        border-radius: 9px;
        padding: 8px 14px;
        font-weight: 600;
    }

    .btn-hapus-user:hover {
        background: #f8caca;
        color: #c82333;
    }

    /* PAGINATION */
    .user-pagination {
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .user-header {
            flex-direction: column;
            gap: 15px;
        }

        .btn-tambah-user {
            width: 100%;
            text-align: center;
        }

        .user-title {
            font-size: 27px;
        }
    }
</style>


<div class="user-page">

    {{-- HEADER --}}
    <div class="user-header">

        <div>

            <h1 class="user-title">
                👤 Halaman User
            </h1>

            <p class="user-subtitle">
                Kelola pengguna aplikasi
            </p>

        </div>

        <a href="{{ route('admin.users.create') }}"
           class="btn btn-tambah-user">

            + Tambah User

        </a>

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="user-alert">
            {{ session('success') }}
        </div>

    @endif


    {{-- TABLE --}}
    <div class="user-table-card">

        <div class="table-responsive">

            <table class="table user-table">

                <thead>

                    <tr>

                        <th class="user-no">
                            #
                        </th>

                        <th>
                            Nama User
                        </th>

                        <th>
                            Email
                        </th>

                        <th class="user-role">
                            Role
                        </th>

                        <th class="user-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($users as $user)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="user-no">

                                {{ $users->firstItem() + $loop->index }}

                            </td>


                            {{-- NAMA --}}
                            <td class="user-nama">

                                {{ $user->name }}

                            </td>


                            {{-- EMAIL --}}
                            <td>

                                {{ $user->email }}

                            </td>


                            {{-- ROLE --}}
                            <td class="user-role">

                                @if($user->role)

                                    @if(strtolower($user->role->name) == 'admin')

                                        <span class="badge-role badge-admin">
                                            {{ $user->role->name }}
                                        </span>

                                    @elseif(strtolower($user->role->name) == 'kasir')

                                        <span class="badge-role badge-kasir">
                                            {{ $user->role->name }}
                                        </span>

                                    @else

                                        <span class="badge-role badge-default">
                                            {{ $user->role->name }}
                                        </span>

                                    @endif

                                @else

                                    <span class="badge-role badge-default">
                                        Tidak ada role
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="user-aksi">

                                <div class="user-aksi-wrapper">

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="btn btn-edit-user">

                                        ✏️ Edit

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                          method="POST"
                                          style="margin: 0;">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-hapus-user"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            🗑️ Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                Belum ada user.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($users->hasPages())

            <div class="user-pagination">

                {{ $users->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
