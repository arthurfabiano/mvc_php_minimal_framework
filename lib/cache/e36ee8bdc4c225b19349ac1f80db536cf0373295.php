<?php $__env->startSection('title', 'Sistema MCV/MVT'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="text-center">Bem vindo <?php echo e($nome); ?></h1>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mvct/views/home.blade.php ENDPATH**/ ?>