

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Gestion des Clients</h1>

    <!-- Boutons d'action -->
    <div class="mb-3">
        <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-primary">Ajouter un Client</a>
        <a href="<?php echo e(route('comptes.index')); ?>" class="btn btn-secondary ms-2">Voir les Comptes</a>
        <a href="<?php echo e(route('virement.create')); ?>" class="btn btn-success ms-2">Faire un Virement</a>
    </div>

    <!-- Message de succès -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Tableau des clients -->
    <?php if($clients->count() > 0): ?>
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><strong><?php echo e($client->id); ?></strong></td>
                    <td><?php echo e($client->nom); ?></td>
                    <td><?php echo e($client->prenom); ?></td>
                    <td><?php echo e($client->email); ?></td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="<?php echo e(route('clients.edit', $client)); ?>" class="btn btn-sm btn-warning">
                            Modifier
                        </a>

                        <!-- Bouton Supprimer -->
                        <form action="<?php echo e(route('clients.destroy', $client)); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Supprimer ce client ? Tous ses comptes seront aussi supprimés.')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Aucun client trouvé. 
            <a href="<?php echo e(route('clients.create')); ?>">Ajouter le premier client</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Programation\Laravel\bank-manager\resources\views/clients/index.blade.php ENDPATH**/ ?>