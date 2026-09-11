

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('errors')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('errors')); ?>

    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<h4 class="mb-3">
    <?php echo e($mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

</h4>

<div class="row">

    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">

                
                <div class="mb-3">
                    <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                        <input
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control"
                            placeholder="Cari produk..."
                            onkeyup="this.form.submit()"
                        >
                    </form>
                </div>

                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <form
                        method="POST"
                        action="<?php echo e(route('itempenjualan.store')); ?>"
                        class="row mb-3 align-items-center"
                    >
                        <?php echo csrf_field(); ?>

                        <input
                            type="hidden"
                            name="produk_id"
                            value="<?php echo e($product->id); ?>"
                        >

                        
                        <div class="col-7">

                            <div class="d-flex align-items-center gap-2">

                                
                                <?php if($product->foto): ?>
                                    <img
                                        src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                        alt="<?php echo e($product->nama); ?>"
                                        class="rounded-circle"
                                        style="
                                            width:45px;
                                            height:45px;
                                            object-fit:cover;
                                        "
                                    >
                                <?php else: ?>
                                    <div
                                        class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                        style="
                                            width:45px;
                                            height:45px;
                                            font-size:20px;
                                        "
                                    >
                                        📦
                                    </div>
                                <?php endif; ?>

                                
                                <div>
                                    <div class="fw-semibold">
                                        <?php echo e($product->nama); ?>

                                    </div>

                                    <small class="text-muted">
                                        Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                                    </small>

                                    <br>

                                    <small class="text-muted">
                                        Stok: <?php echo e($product->stok); ?>

                                    </small>
                                </div>

                            </div>

                        </div>

                        
                        <div class="col-2">

                            <input
                                type="number"
                                name="kuantitas"
                                value="1"
                                min="1"
                                max="<?php echo e($product->stok); ?>"
                                class="form-control"
                                <?php echo e($product->stok <= 0 || $sale->status === 'COMPLETED' ? 'disabled' : ''); ?>

                            >

                        </div>

                        
                        <div class="col-3">

                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                                <?php echo e($product->stok <= 0 || $sale->status === 'COMPLETED' ? 'disabled' : ''); ?>

                            >
                                🛒 Masukkan
                            </button>

                        </div>

                    </form>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>


    
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h5 class="mb-0">
                    🛒 Keranjang
                </h5>
            </div>

            <table class="table table-bordered mb-0">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            
                            <td>
                                <?php echo e($item->produk->nama); ?>

                            </td>

                            
                            <td>
                                Rp <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?>

                            </td>

                            
                            <td>

                                <form
                                    method="POST"
                                    action="<?php echo e(route('itempenjualan.update', $item->id)); ?>"
                                    class="d-flex gap-1"
                                >

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <input
                                        type="number"
                                        name="quantity"
                                        value="<?php echo e($item->kuantitas); ?>"
                                        min="1"
                                        class="form-control"
                                        style="width:75px;"
                                        <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>

                                    >

                                    <?php if($sale->status !== 'COMPLETED'): ?>
                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Update jumlah"
                                        >
                                            ✓
                                        </button>
                                    <?php endif; ?>

                                </form>

                            </td>

                            
                            <td>
                                Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                            </td>

                            
                            <td>

                                <?php if($sale->status !== 'COMPLETED'): ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>

                                        <form
                                            method="POST"
                                            action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>"
                                            onsubmit="return confirm('Hapus produk dari keranjang?')"
                                        >

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td
                                colspan="5"
                                class="text-center text-muted py-4"
                            >
                                🛒 Keranjang masih kosong
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>


            
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <span class="fw-semibold">
                        Total Pembayaran
                    </span>

                    <strong class="text-primary fs-5">
                        Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                    </strong>

                </div>


                
                <?php if($sale->status !== 'COMPLETED'): ?>

                    <form
                        method="POST"
                        action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                        onsubmit="return confirm('Yakin ingin menyelesaikan pembayaran?')"
                    >

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <select
                            name="payment_method"
                            class="form-select mb-2"
                            required
                        >

                            <option value="">
                                Pilih Pembayaran
                            </option>

                            <option value="CASH">
                                Cash
                            </option>

                            <option value="QRIS">
                                QRIS
                            </option>

                        </select>

                        <button
                            type="submit"
                            class="btn btn-success w-100"
                            <?php echo e($sale->itemPenjualan->count() === 0 ? 'disabled' : ''); ?>

                        >
                            Selesaikan Pembayaran
                        </button>

                    </form>


                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

                        <form
                            action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
                            method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')"
                        >

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button
                                type="submit"
                                class="btn btn-outline-danger w-100 mt-2"
                            >
                                Batal Transaksi
                            </button>

                        </form>

                    <?php endif; ?>

                <?php else: ?>

                    <div class="alert alert-success text-center mb-0">
                        ✓ Transaksi sudah selesai
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>