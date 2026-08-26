@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
    /* =========================================
       USERS PAGE
    ========================================= */

    .users-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px 50px;
    }

    /* HEADER */

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .users-title h1 {
        color: #4a3540;
        font-size: 32px;
        font-weight: 700;
        margin: 0;
    }

    .users-title p {
        color: #9a7c88;
        margin: 5px 0 0;
    }

    /* CREATE BUTTON */

    .btn-create-user {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        background: #d77f9a;
        color: white;

        border: none;
        border-radius: 10px;

        padding: 10px 18px;

        text-decoration: none;

        font-size: 14px;
        font-weight: 600;

        transition: 0.2s;
    }

    .btn-create-user:hover {
        background: #c96d89;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(201, 109, 137, 0.25);
    }


    /* =========================================
       SEARCH BOX
    ========================================= */

    .search-card {
        background: #ffffff;

        border: 1px solid #f1d5df;
        border-radius: 15px;

        padding: 15px;

        margin-bottom: 20px;

        box-shadow: 0 5px 18px rgba(215, 127, 154, 0.08);
    }

    .search-form {
        display: flex;
        gap: 10px;
    }

    .search-input {
        flex: 1;

        border: 1px solid #ead1da;
        border-radius: 9px;

        padding: 10px 13px;

        color: #5a414b;

        outline: none;
    }

    .search-input:focus {
        border-color: #d77f9a;

        box-shadow: 0 0 0 3px rgba(215, 127, 154, 0.12);
    }

    .search-input::placeholder {
        color: #b49ba5;
    }

    .btn-search {
        background: #fcecf2;
        color: #c96d89;

        border: 1px solid #f1d5df;

        border-radius: 9px;

        padding: 10px 20px;

        font-weight: 600;

        transition: 0.2s;
    }

    .btn-search:hover {
        background: #f8dce6;
        color: #b85d7b;
    }


    /* =========================================
       TABLE CARD
    ========================================= */

    .users-table-card {
        background: #ffffff;

        border: 1px solid #f1d5df;
        border-radius: 16px;

        overflow: hidden;

        box-shadow: 0 5px 20px rgba(215, 127, 154, 0.08);
    }

    .table-responsive {
        overflow-x: auto;
    }

    .users-table {
        width: 100%;
        margin: 0;

        border-collapse: collapse;
    }

    .users-table thead th {
        background: #fcecf2;

        color: #694754;

        font-size: 14px;
        font-weight: 700;

        padding: 14px;

        border-bottom: 1px solid #f1d5df;

        white-space: nowrap;
    }

    .users-table tbody td {
        padding: 14px;

        color: #5a414b;

        border-bottom: 1px solid #f7e4ea;

        vertical-align: middle;
    }

    .users-table tbody tr {
        transition: 0.2s;
    }

    .users-table tbody tr:hover {
        background: #fff8fb;
    }

    .users-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================
       ROLE BADGE
    ========================================= */

    .role-badge {
        display: inline-block;

        padding: 5px 12px;

        border-radius: 20px;

        font-size: 12px;
        font-weight: 700;
    }

    .role-admin {
        background: #fce1eb;
        color: #c35f7d;
    }

    .role-kasir {
        background: #f8edf2;
        color: #9b687a;
    }


    /* =========================================
       ACTION BUTTON
    ========================================= */

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-edit,
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        border: none;
        border-radius: 8px;

        padding: 7px 11px;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition: 0.2s;
    }


    /* EDIT */

    .btn-edit {
        background: #f8dce6;
        color: #b85d7b;
    }

    .btn-edit:hover {
        background: #f2cbd8;
        color: #a94f6d;

        transform: translateY(-1px);
    }


    /* DELETE */

    .btn-delete {
        background: #f8e1e6;
        color: #c75f70;
    }

    .btn-delete:hover {
        background: #f3ccd5;
        color: #b94e61;

        transform: translateY(-1px);
    }


    /* ICON */

    .action-icon {
        font-size: 15px;
        line-height: 1;
    }


    /* =========================================
       EMPTY DATA
    ========================================= */

    .empty-users {
        text-align: center;

        padding: 35px !important;

        color: #9a7c88 !important;
    }


    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 768px) {

        .users-container {
            padding: 20px 12px 40px;
        }

        .users-header {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .users-title h1 {
            font-size: 26px;
        }

        .btn-create-user {
            justify-content: center;
        }

        .search-form {
            flex-direction: column;
        }

        .btn-search {
            width: 100%;
        }

        .users-table {
            min-width: 750px;
        }

        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-edit,
        .btn-delete {
            width: 100%;
        }
    }
</style>


<div class="users-container">

    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="users-header">

        <div class="users-title">
            <h1>👤 Halaman Users</h1>

            <p>
                Kelola akun pengguna sistem POS
            </p>
        </div>

        <a
            href="{{ route('admin.users.create') }}"
            class="btn-create-user"
        >
            ➕ Tambah User
        </a>

    </div>


    {{-- =========================================
         SEARCH
    ========================================== --}}

    <div class="search-card">

        <form
            action="{{ route('admin.users') }}"
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="🔍 Cari username atau email..."
                value="{{ request('search') }}"
            >

            <button
                type="submit"
                class="btn-search"
            >
                🔍 Cari
            </button>

        </form>

    </div>


    {{-- =========================================
         TABLE
    ========================================== --}}

    <div class="users-table-card">

        <div class="table-responsive">

            <table class="users-table">

                <thead>

                    <tr>
                        <th width="5%">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="180px">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($users as $index => $user)

                        <tr>

                            <td>
                                {{ $users->firstItem() + $index }}
                            </td>

                            <td>
                                <strong>
                                    {{ $user->name }}
                                </strong>
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>

                                @if ($user->role === 'admin')

                                    <span class="role-badge role-admin">
                                        👑 Admin
                                    </span>

                                @else

                                    <span class="role-badge role-kasir">
                                        💼 Kasir
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="action-buttons">

                                    {{-- EDIT AKUN --}}

                                    <a
                                        href="{{ route('admin.users.edit', $user->id) }}"
                                        class="btn-edit"
                                        title="Edit akun"
                                    >
                                        <span class="action-icon">
                                            ✏️
                                        </span>

                                        Edit
                                    </a>


                                    {{-- HAPUS AKUN --}}

                                    <form
                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun ini?')"
                                        style="margin: 0;"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-delete"
                                            title="Hapus akun"
                                        >
                                            <span class="action-icon">
                                                🗑️
                                            </span>

                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="empty-users"
                            >
                                👤 Belum ada data user.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- PAGINATION --}}

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection