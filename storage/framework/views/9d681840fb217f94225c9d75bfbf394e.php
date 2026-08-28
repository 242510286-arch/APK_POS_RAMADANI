

<?php $__env->startSection('title', 'Edit Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .jenis-page {
        min-height: calc(100vh - 70px);
        background: linear-gradient(135deg, #fff0f5, #fde7ef);
        padding: 40px 20px;
    }

    .jenis-card {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 15px 40px rgba(190, 80, 120, 0.12);
    }

    .jenis-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
    }

    .jenis-icon {
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

    .jenis-header h2 {
        margin: 0;
        color: #44303a;
        font-size: 25px;
        font-weight: 700;
    }

    .jenis-header p {
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

    .form-control {
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

    .form-control:focus {
        border-color: #df638d;
        box-shadow: 0 0 0 3px rgba(223, 99, 141, 0.12);
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .button-area {
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #f2d7e1;
        display: flex;
        gap: 10px;
    }

    .btn-simpan {
        border: none;
        background: #df638d;
        color: white;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-simpan:hover {
        background: #d65380;
        color: white;
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
        color: #a55d79;
    }

    @media (max-width: 768px) {
        .jenis-card {
            padding: 22px;
        }
    }
</style>

<div class="jenis-page">

    <div class="jenis-card">

        
        <div class="jenis-header">

            <div class="jenis-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h2>Edit Jenis Produk</h2>
                <p>Perbarui nama jenis produk</p>
            </div>

        </div>


        
        <form action="<?php echo e(route('jenis-produk.update', $jenisProduk->id)); ?>"
              method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            
            <div class="form-group">

                <label for="nama_jenis">
                    <i class="bi bi-list"></i>
                    Nama Jenis Produk
                </label>

                <input
                    type="text"
                    id="nama_jenis"
                    name="nama_jenis"
                    class="form-control"
                    value="<?php echo e(old('nama_jenis', $jenisProduk->nama_jenis)); ?>"
                    placeholder="Masukkan nama jenis produk"
                    required
                >

                <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
            <div class="button-area">

                <button type="submit" class="btn-simpan">
                    <i class="bi bi-save"></i>
                    Update
                </button>

                <a href="<?php echo e(route('jenis-produk.index')); ?>"
                   class="btn-kembali">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI-main\resources\views/jenis-produk/edit.blade.php ENDPATH**/ ?>