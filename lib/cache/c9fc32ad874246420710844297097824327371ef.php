<?php $__env->startSection('title', 'Sistema MCV/MVT'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="text-center">Bem vindo <?php echo e($nome); ?></h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($u->id); ?></th>
                        <td><?php echo e($u->name); ?></td>
                        <td><?php echo e($u->email); ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                            <button type="button" class="btn btn-danger btn-sm">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/mvc/app/views/home.blade.php ENDPATH**/ ?>