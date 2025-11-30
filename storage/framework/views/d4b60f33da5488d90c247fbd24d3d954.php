<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
        <h1 class="mb-0">Gestion des Comptes Bancaires</h1>
        <a href="<?php echo e(route('comptes.create')); ?>" class="btn btn-primary">
            <span></span> Ajouter un Compte
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($comptes->count() > 0): ?>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>RIB</th>
                    <th>Solde</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($compte->id); ?></td>
                    <td><strong><?php echo e($compte->rib); ?></strong></td>
                    <td><?php echo e(number_format($compte->solde, 2)); ?> DH</td>
                    <td><?php echo e($compte->client->nom); ?> <?php echo e($compte->client->prenom); ?></td>
                    <td>
                        <a href="<?php echo e(route('comptes.edit', $compte)); ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="<?php echo e(route('comptes.destroy', $compte)); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer ce compte ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucun compte. <a href="<?php echo e(route('comptes.create')); ?>">Ajouter le premier</a></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Programming\Laravel\bank-manager\resources\views/comptes/index.blade.php ENDPATH**/ ?>