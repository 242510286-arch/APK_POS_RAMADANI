

<?php $__env->startSection('title', 'User'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>

/* =========================================================
   HALAMAN USER
========================================================= */

.user-page {
    max-width: 1160px;
    margin: 0 auto;
    padding: 35px 0 50px;
}


/* =========================================================
   HEADER
========================================================= */

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


/* =========================================================
   TOMBOL TAMBAH USER
========================================================= */

.btn-tambah-user {
    background: #d86d91 !important;
    border: none !important;
    color: white !important;
    padding: 11px 20px !important;
    border-radius: 10px !important;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(216, 109, 145, 0.18);
}

.btn-tambah-user:hover {
    background: #c95d81 !important;
    color: white !important;
}


/* =========================================================
   SUCCESS
========================================================= */

.user-alert {
    background: #dff7e7;
    border: 1px solid #b8e8c8;
    color: #198754;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 20px;
}


/* =========================================================
   TABLE CARD
========================================================= */

.user-table-card {
    width: 100%;
    background: white;

    border: 1px solid #f1d7e1;

    border-radius: 15px;

    overflow: hidden;

    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);

    padding: 0 !important;
}


/* =========================================================
   TABLE RESPONSIVE
========================================================= */

.user-table-card .table-responsive {
    width: 100% !important;

    margin: 0 !important;
    padding: 0 !important;

    border: none !important;
}


/* =========================================================
   TABLE USER
========================================================= */

.user-table {
    width: 100% !important;
    max-width: 100% !important;

    margin: 0 !important;
    padding: 0 !important;

    border-collapse: collapse !important;
    border-spacing: 0 !important;

    table-layout: fixed !important;

    border: none !important;

    empty-cells: show;
}


/* =========================================================
   LEBAR KOLOM
========================================================= */

.user-table .col-no {
    width: 8% !important;
}

.user-table .col-nama {
    width: 27% !important;
}

.user-table .col-email {
    width: 30% !important;
}

.user-table .col-role {
    width: 15% !important;
}

.user-table .col-aksi {
    width: 20% !important;
}


/* =========================================================
   PAKSA STRUKTUR TABLE ASLI
========================================================= */

.user-table thead {
    display: table-header-group !important;

    width: 100% !important;

    margin: 0 !important;
    padding: 0 !important;

    border: none !important;
}

.user-table tbody {
    display: table-row-group !important;

    width: 100% !important;

    margin: 0 !important;
    padding: 0 !important;

    border: none !important;
}

.user-table tr {
    display: table-row !important;

    width: 100% !important;

    margin: 0 !important;
    padding: 0 !important;
}


/* =========================================================
   HEADER TABLE
========================================================= */

.user-table thead tr {
    background: #fff5f8 !important;

    border: none !important;
}

.user-table thead th {
    display: table-cell !important;

    background: #fff5f8 !important;

    color: #17233c !important;

    padding: 14px 12px !important;

    margin: 0 !important;

    font-weight: 700 !important;

    text-align: center !important;

    vertical-align: middle !important;

    white-space: nowrap !important;

    border: none !important;

    border-bottom: 1px solid #f1d7e1 !important;

    border-radius: 0 !important;

    box-shadow: none !important;

    outline: none !important;
}


/* =========================================================
   HEADER TIDAK TERPISAH
========================================================= */

.user-table thead th:first-child {
    border-top-left-radius: 0 !important;
}

.user-table thead th:last-child {
    border-top-right-radius: 0 !important;
}

.user-table thead th:nth-child(1),
.user-table thead th:nth-child(2),
.user-table thead th:nth-child(3),
.user-table thead th:nth-child(4),
.user-table thead th:nth-child(5) {
    border-left: none !important;
    border-right: none !important;

    box-shadow: none !important;

    outline: none !important;
}


/* =========================================================
   BODY TABLE
========================================================= */

.user-table tbody td {
    display: table-cell !important;

    padding: 14px 12px !important;

    margin: 0 !important;

    vertical-align: middle !important;

    color: #17233c !important;

    background: transparent !important;

    border: none !important;

    border-radius: 0 !important;

    box-shadow: none !important;

    outline: none !important;
}


/* =========================================================
   GARIS PEMISAH BARIS
========================================================= */

.user-table tbody tr {
    border: none !important;

    border-bottom: 1px solid #f0eeee !important;
}

.user-table tbody tr:last-child {
    border-bottom: none !important;
}

.user-table tbody tr:hover td {
    background: #fffafb !important;
}


/* =========================================================
   MATIKAN BORDER BAWAAN BOOTSTRAP
========================================================= */

.user-table > :not(caption) > * > * {
    border-bottom: none !important;
}

.user-table th,
.user-table td {
    border-left: none !important;
    border-right: none !important;

    border-spacing: 0 !important;
}


/* =========================================================
   KOLOM NOMOR
========================================================= */

.user-table th.user-no,
.user-table td.user-no {
    width: 8% !important;

    text-align: center !important;

    vertical-align: middle !important;
}


/* =========================================================
   KOLOM NAMA
========================================================= */

.user-table th.user-nama,
.user-table td.user-nama {
    width: 27% !important;

    text-align: center !important;

    vertical-align: middle !important;
}

.user-table td.user-nama {
    font-weight: 600 !important;
}


/* =========================================================
   KOLOM EMAIL
========================================================= */

.user-table th.user-email,
.user-table td.user-email {
    width: 30% !important;

    text-align: center !important;

    vertical-align: middle !important;
}

.user-table td.user-email {
    overflow: hidden !important;

    text-overflow: ellipsis !important;

    white-space: nowrap !important;
}


/* =========================================================
   KOLOM ROLE
========================================================= */

.user-table th.user-role,
.user-table td.user-role {
    width: 15% !important;

    text-align: center !important;

    vertical-align: middle !important;

    background: transparent !important;

    border: none !important;

    border-radius: 0 !important;

    box-shadow: none !important;

    outline: none !important;
}

.user-table th.user-role {
    background: #fff5f8 !important;

    border-bottom: 1px solid #f1d7e1 !important;
}


/* =========================================================
   BADGE ROLE
========================================================= */

.badge-role {
    display: inline-block !important;

    padding: 6px 14px !important;

    border-radius: 8px !important;

    font-size: 13px !important;

    font-weight: 600 !important;

    box-shadow: none !important;

    border: none !important;
}

.badge-admin {
    background: #e8e5ff !important;

    color: #5548d9 !important;
}

.badge-kasir {
    background: #dff7e7 !important;

    color: #198754 !important;
}

.badge-default {
    background: #eeeeee !important;

    color: #666666 !important;
}


/* =========================================================
   KOLOM AKSI
========================================================= */

.user-table th.user-aksi,
.user-table td.user-aksi {
    width: 20% !important;

    text-align: center !important;

    vertical-align: middle !important;

    background: transparent !important;

    border: none !important;

    border-radius: 0 !important;

    box-shadow: none !important;

    outline: none !important;

    white-space: nowrap !important;
}

.user-table th.user-aksi {
    background: #fff5f8 !important;

    border-bottom: 1px solid #f1d7e1 !important;
}


/* =========================================================
   WRAPPER AKSI
========================================================= */

.user-aksi-wrapper {
    display: flex !important;

    align-items: center !important;

    justify-content: center !important;

    gap: 8px !important;

    margin: 0 !important;

    padding: 0 !important;
}


/* =========================================================
   BUTTON EDIT
========================================================= */

.btn-edit-user {
    background: #fff1c9 !important;

    color: #c98200 !important;

    border: none !important;

    border-radius: 9px !important;

    padding: 8px 14px !important;

    font-weight: 600 !important;

    text-decoration: none !important;

    box-shadow: none !important;
}

.btn-edit-user:hover {
    background: #ffe5a1 !important;

    color: #a96d00 !important;
}


/* =========================================================
   BUTTON HAPUS
========================================================= */

.btn-hapus-user {
    background: #fde2e2 !important;

    color: #dc3545 !important;

    border: none !important;

    border-radius: 9px !important;

    padding: 8px 14px !important;

    font-weight: 600 !important;

    box-shadow: none !important;
}

.btn-hapus-user:hover {
    background: #f8caca !important;

    color: #c82333 !important;
}


/* =========================================================
   FORM HAPUS
========================================================= */

.user-aksi-wrapper form {
    margin: 0 !important;

    padding: 0 !important;

    display: inline-block !important;
}


/* =========================================================
   PAGINATION
========================================================= */

.user-pagination {
    padding: 15px 20px;

    display: flex;

    justify-content: center;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .user-page {
        padding-left: 15px;
        padding-right: 15px;
    }

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

    .user-table-card {
        overflow: hidden;
    }

    .user-table-card .table-responsive {
        overflow-x: auto;
    }

    .user-table {
        min-width: 850px !important;
    }
}

</style>


<div class="user-page">

    

    <div class="user-header">

        <div>

            <h1 class="user-title">
                Halaman User
            </h1>

            <p class="user-subtitle">
                Kelola pengguna aplikasi
            </p>

        </div>


        <a href="<?php echo e(route('admin.users.create')); ?>"
           class="btn btn-tambah-user">

            + Tambah User

        </a>

    </div>


    

    <?php if(session('success')): ?>

        <div class="user-alert">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    

    <div class="user-table-card">

        <div class="table-responsive">

            

            <table class="user-table">

                

                <colgroup>

                    <col class="col-no">

                    <col class="col-nama">

                    <col class="col-email">

                    <col class="col-role">

                    <col class="col-aksi">

                </colgroup>


                

                <thead>

                    <tr>

                        <th class="user-no">
                            #
                        </th>

                        <th class="user-nama">
                            Nama User
                        </th>

                        <th class="user-email">
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

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            

                            <td class="user-no">

                                <?php echo e($users->firstItem() + $loop->index); ?>


                            </td>


                            

                            <td class="user-nama">

                                <?php echo e($user->name); ?>


                            </td>


                            

                            <td class="user-email">

                                <?php echo e($user->email); ?>


                            </td>


                            

                            <td class="user-role">

                                <?php if($user->role): ?>

                                    <?php if(strtolower($user->role->name) == 'admin'): ?>

                                        <span class="badge-role badge-admin">

                                            <?php echo e($user->role->name); ?>


                                        </span>

                                    <?php elseif(strtolower($user->role->name) == 'kasir'): ?>

                                        <span class="badge-role badge-kasir">

                                            <?php echo e($user->role->name); ?>


                                        </span>

                                    <?php else: ?>

                                        <span class="badge-role badge-default">

                                            <?php echo e($user->role->name); ?>


                                        </span>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <span class="badge-role badge-default">

                                        Tidak ada role

                                    </span>

                                <?php endif; ?>

                            </td>


                            

                            <td class="user-aksi">

                                <div class="user-aksi-wrapper">


                                    

                                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                       class="btn btn-edit-user">

                                        ✏️ Edit

                                    </a>


                                    

                                    <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>"
                                          method="POST">

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="btn btn-hapus-user"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            🗑️ Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                Belum ada user.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        

        <?php if($users->hasPages()): ?>

            <div class="user-pagination">

                <?php echo e($users->links()); ?>


            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI\resources\views/users/index.blade.php ENDPATH**/ ?>