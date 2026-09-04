

<?php $__env->startSection('title', 'Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>

    /* =========================
       HALAMAN
    ========================= */

    .jenis-page {
        max-width: 1160px;
        margin: 0 auto;
        padding: 35px 0 50px;
    }


    /* =========================
       HEADER
    ========================= */

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


    /* =========================
       TOMBOL TAMBAH
    ========================= */

    .btn-tambah-jenis {
        background: #d86d91;
        border: none;
        color: white;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(216, 109, 145, 0.18);
        transition: 0.2s;
    }

    .btn-tambah-jenis:hover {
        background: #c95d81;
        color: white;
        transform: translateY(-1px);
    }


    /* =========================
       TABLE CARD
    ========================= */

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
        table-layout: fixed;
    }


    /* =========================
       HEADER TABLE
    ========================= */

    .jenis-table thead th {
        background: #fff5f8;
        color: #17233c;
        padding: 15px 14px;
        border-bottom: 1px solid #f1d7e1;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
    }

    /* Header Nama Jenis Produk */
    .jenis-table thead th.jenis-nama {
        text-align: left;
        padding-left: 30px !important;
    }


    /* =========================
       BODY TABLE
    ========================= */

    .jenis-table tbody td {
        padding: 15px 14px;
        vertical-align: middle;
        border-bottom: 1px solid #f0eeee;
        color: #17233c;
    }

    .jenis-table tbody tr:last-child td {
        border-bottom: none;
    }

    .jenis-table tbody tr {
        transition: 0.2s;
    }

    .jenis-table tbody tr:hover {
        background: #fffafb;
    }


    /* =========================
       KOLOM
    ========================= */

    .jenis-no {
        width: 8%;
        text-align: center;
    }

    .jenis-nama {
        width: 32%;
        font-weight: 600;
        text-align: left;
        padding-left: 30px !important;
    }

    .jenis-diinput {
        width: 35%;
        text-align: center;
    }

    .jenis-aksi {
        width: 25%;
        text-align: center;
        white-space: nowrap;
    }


    /* =========================
       INFORMASI USER
    ========================= */

    .jenis-user {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 2px 0;
        align-items: center;
    }

    .jenis-user-nama {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #17233c;
        font-size: 14px;
        font-weight: 600;
    }

    .jenis-user-email {
        color: #888;
        font-size: 13px;
        padding-left: 21px;
    }

    .jenis-user-lama {
        color: #aaa;
        font-size: 13px;
        font-style: italic;
    }


    /* =========================
       AKSI
    ========================= */

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
        transition: 0.2s;
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
        transition: 0.2s;
    }

    .btn-hapus-jenis:hover {
        background: #f8caca;
        color: #c82333;
    }


    /* =========================
       EMPTY DATA
    ========================= */

    .jenis-empty {
        padding: 45px 20px !important;
        text-align: center;
        color: #777 !important;
    }

    .jenis-empty-icon {
        font-size: 35px;
        margin-bottom: 8px;
    }

    .jenis-empty-text {
        font-size: 14px;
    }


    /* =========================
       PAGINATION
    ========================= */

    .jenis-pagination {
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }


    /* =========================
       RESPONSIVE
    ========================= */

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
            text-align: center;
        }

        .jenis-title {
            font-size: 27px;
        }

        .jenis-table {
            min-width: 900px;
            table-layout: fixed;
        }

        .jenis-table-card {
            overflow: hidden;
        }

    }

</style>


<div class="jenis-page">

    

    <div class="jenis-header">

        <div>

            <h1 class="jenis-title">
                 Halaman Jenis Produk
            </h1>

            <p class="jenis-subtitle">
                Kelola jenis atau kategori produk
            </p>

        </div>


        

        <a href="<?php echo e(route('jenis-produk.create')); ?>"
           class="btn btn-tambah-jenis">

            + Tambah Jenis Produk

        </a>

    </div>


    

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


                        

                        <th class="jenis-diinput">
                            Diinput Oleh
                        </th>


                        

                        <th class="jenis-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $jenisProduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            

                            <td class="jenis-no">

                                <?php echo e($loop->iteration); ?>


                            </td>


                            

                            <td class="jenis-nama">

                                <?php echo e($jenis->nama_jenis); ?>


                            </td>


                            

                            <td class="jenis-diinput">

                                <?php if($jenis->created_by_name || $jenis->created_by_email): ?>

                                    <div class="jenis-user">

                                        

                                        <div class="jenis-user-nama">

                                            <span>👤</span>

                                            <span>
                                                <?php echo e($jenis->created_by_name ?? 'Tidak diketahui'); ?>

                                            </span>

                                        </div>


                                        

                                        <div class="jenis-user-email">

                                            <?php echo e($jenis->created_by_email ?? '-'); ?>


                                        </div>

                                    </div>

                                <?php else: ?>

                                    

                                    <div class="jenis-user-lama">

                                        Data lama

                                    </div>

                                <?php endif; ?>

                            </td>


                            

                            <td class="jenis-aksi">

                                <div class="jenis-aksi-wrapper">

                                    

                                    <a href="<?php echo e(route('jenis-produk.edit', $jenis->id)); ?>"
                                       class="btn btn-edit-jenis">

                                        ✏️ Edit

                                    </a>


                                    

                                    <form action="<?php echo e(route('jenis-produk.destroy', $jenis->id)); ?>"
                                          method="POST"
                                          style="margin: 0;">

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="btn btn-hapus-jenis"
                                                onclick="return confirm('Yakin ingin menghapus jenis produk ini?')">

                                            🗑️ Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        

                        <tr>

                            <td colspan="4"
                                class="jenis-empty">

                                <div class="jenis-empty-icon">
                                    📦
                                </div>

                                <div class="jenis-empty-text">
                                    Belum ada jenis produk.
                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        

        <?php if(method_exists($jenisProduks, 'hasPages') && $jenisProduks->hasPages()): ?>

            <div class="jenis-pagination">

                <?php echo e($jenisProduks->links()); ?>


            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI\resources\views/jenis-produk/index.blade.php ENDPATH**/ ?>