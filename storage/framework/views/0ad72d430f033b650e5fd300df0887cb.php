

<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>

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

        
        <div class="produk-header">

            <div class="produk-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h2>Edit Produk</h2>
                <p>Perbarui data produk dalam sistem POS</p>
            </div>

        </div>


        
        <form action="<?php echo e(route('produk.update', $produk)); ?>"
              method="POST"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            <div class="produk-grid">

                
                <div>

                    
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

                        <?php $__errorArgs = ['gambar'];
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


                    
                    <div class="form-group">

                        <label>
                            <i class="bi bi-tag"></i>
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            value="<?php echo e(old('nama_produk', $produk->nama)); ?>"
                            placeholder="Masukkan nama produk"
                            required
                        >

                        <?php $__errorArgs = ['nama_produk'];
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

                            <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option
                                    value="<?php echo e($item->id); ?>"
                                    <?php echo e(old('jenis_id', $produk->jenis_id) == $item->id ? 'selected' : ''); ?>

                                >
                                    <?php echo e($item->nama_jenis); ?>

                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <?php $__errorArgs = ['jenis_id'];
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


                    
                    <div class="form-group">

                        <label>
                            <i class="bi bi-cash"></i>
                            Harga Beli
                        </label>

                        <input
                            type="number"
                            name="harga_beli"
                            value="<?php echo e(old('harga_beli', $produk->harga_beli)); ?>"
                            placeholder="Masukkan harga beli"
                            required
                        >

                        <?php $__errorArgs = ['harga_beli'];
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


                    
                    <div class="form-group">

                        <label>
                            <i class="bi bi-tags"></i>
                            Harga Jual
                        </label>

                        <input
                            type="number"
                            name="harga_jual"
                            value="<?php echo e(old('harga_jual', $produk->harga_jual)); ?>"
                            placeholder="Masukkan harga jual"
                            required
                        >

                        <?php $__errorArgs = ['harga_jual'];
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


                    
                    <div class="form-group">

                        <label>
                            <i class="bi bi-boxes"></i>
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="<?php echo e(old('stok', $produk->stok)); ?>"
                            placeholder="Masukkan jumlah stok"
                            required
                        >

                        <?php $__errorArgs = ['stok'];
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

                </div>


                
                <div>

                    <div class="preview-title">
                        <i class="bi bi-camera"></i>
                        Preview Foto
                    </div>

                    <div class="preview-box">

                        <?php if($produk->foto): ?>

                            <img
                                id="preview"
                                src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
                                alt="<?php echo e($produk->nama); ?>"
                            >

                        <?php else: ?>

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

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            
            <div class="button-area">

                <button
                    type="submit"
                    class="btn-simpan"
                >
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="<?php echo e(route('produk.index')); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI-main\resources\views/produk/edit.blade.php ENDPATH**/ ?>