<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <!-- Isi title yang kita kirimkan dari views lain -->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Memanggil Bootstrap/Vite -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>

<body>

    <div class="container">

        <?php if(session('success')): ?>

            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>

        <?php endif; ?>

        <!-- Isi konten yang kita kirimkan dari views lain -->
        <?php echo $__env->yieldContent('content'); ?>

    </div>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\APK_POS_RAMA\resources\views/layouts/app.blade.php ENDPATH**/ ?>