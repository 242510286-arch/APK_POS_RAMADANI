

<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .sale-page {
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #fff0f5, #fde7ef);
        padding: 40px 20px;
    }

    .sale-card {
        max-width: 1000px;
        margin: auto;
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(190, 80, 120, 0.12);
    }

    .sale-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .sale-icon {
        width: 52px;
        height: 52px;
        background: #df638d;
        color: white;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .sale-header h2 {
        margin: 0;
        color: #44303a;
        font-size: 25px;
        font-weight: 700;
    }

    .sale-header p {
        margin: 4px 0 0;
        color: #b18a9a;
        font-size: 13px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 30px;
    }

    .info-box {
        background: #fffafd;
        border: 1px solid #f0cbd9;
        border-radius: 14px;
        padding: 15px;
    }

    .info-box small {
        display: block;
        color: #b18a9a;
        margin-bottom: 5px;
        font-size: 12px;
    }

    .info-box strong {
        color: #624451;
        font-size: 15px;
    }

    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        background: #fde1eb;
        color: #c84f78;
        font-size: 12px;
        font-weight: 600;
    }

    .table-wrapper {
        overflow-x: auto;
        border: 1px solid #f0cbd9;
        border-radius: 15px;
    }

    .sale-table {
        width: 100%;
        border-collapse: collapse;
    }

    .sale-table th {
        background: #fff1f6;
        color: #624451;
        padding: 14px;
        text-align: left;
        font-size: 13px;
    }

    .sale-table td {
        padding: 14px;
        border-top: 1px solid #f4dce5;
        color: #624451;
        font-size: 13px;
    }

    .sale-table tr:hover {
        background: #fffafd;
    }

    .total-area {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .total-box {
        width: 300px;
        background: #fff1f6;
        border: 1px solid #f0cbd9;
        border-radius: 15px;
        padding: 18px;
    }

    .total-box div {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        color: #624451;
    }

    .total-box .total {
        border-top: 1px solid #efbfd0;
        padding-top: 12px;
        margin-top: 10px;
        font-size: 18px;
        font-weight: 700;
        color: #d65380;
    }

    .button-area {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #f2d7e1;
    }

    .btn-kembali {
        display: inline-block;
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

    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .sale-card {
            padding: 20px;
        }
    }
</style>


<div class="sale-page">

    <div class="sale-card">

        
        <div class="sale-header">

            <div class="sale-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <div>
                <h2>Detail Penjualan</h2>
                <p>Informasi lengkap transaksi penjualan</p>
            </div>

        </div>


        
        <div class="info-grid">

            <div class="info-box">
                <small>ID Transaksi</small>
                <strong>#<?php echo e($penjualan->id); ?></strong>
            </div>

            <div class="info-box">
                <small>Status</small>

                <span class="status">
                    <?php echo e($penjualan->status); ?>

                </span>
            </div>

            <div class="info-box">
                <small>Metode Pembayaran</small>
                <strong>
                    <?php echo e($penjualan->metode_pembayaran ?? '-'); ?>

                </strong>
            </div>

        </div>


        
        <h4 style="color:#624451; margin-bottom:15px;">
            <i class="bi bi-cart"></i>
            Produk yang Dibeli
        </h4>

        <div class="table-wrapper">

            <table class="sale-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>
                                <?php echo e($loop->iteration); ?>

                            </td>

                            <td>
                                <?php echo e($item->produk->nama ?? '-'); ?>

                            </td>

                            <td>
                                <?php echo e($item->kuantitas); ?>

                            </td>

                            <td>
                                Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="4" style="text-align:center; padding:30px;">
                                Belum ada produk dalam transaksi.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        
        <div class="total-area">

            <div class="total-box">

                <div>
                    <span>Total Pembayaran</span>
                </div>

                <div class="total">
                    <span>Total</span>

                    <span>
                        Rp <?php echo e(number_format($penjualan->total_pembayaran ?? 0, 0, ',', '.')); ?>

                    </span>
                </div>

            </div>

        </div>


        
        <div class="button-area">

            <a href="<?php echo e(route('penjualan.index')); ?>" class="btn-kembali">

                <i class="bi bi-arrow-left"></i>
                Kembali

            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_SEPTI\resources\views/penjualan/show.blade.php ENDPATH**/ ?>