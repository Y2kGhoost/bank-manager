<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card" data-aos="fade-up">
        <div class="card-header">
            <h3 class="card-header-title">
                <span class="header-icon">💳</span>
                Créer un Nouveau Compte Bancaire
            </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('comptes.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label for="rib" class="form-label">RIB (Relevé d'Identité Bancaire) *</label>
                    <input type="text" name="rib" id="rib" class="form-control <?php $__errorArgs = ['rib'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('rib')); ?>" placeholder="Ex: MA123456789012345678901234" required>
                    <?php $__errorArgs = ['rib'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <div class="invalid-feedback"><?php echo e($message); ?></div> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="solde" class="form-label">Solde Initial (DH) *</label>
                    <input type="number" step="0.01" name="solde" id="solde" 
                           class="form-control <?php $__errorArgs = ['solde'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('solde', 0)); ?>" placeholder="0.00" min="0" required>
                    <?php $__errorArgs = ['solde'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <div class="invalid-feedback"><?php echo e($message); ?></div> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="client_id" class="form-label">Client Propriétaire *</label>
                    <select name="client_id" id="client_id" class="form-control <?php $__errorArgs = ['client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">-- Sélectionnez un client --</option>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>" <?php echo e(old('client_id') == $client->id ? 'selected' : ''); ?>>
                                <?php echo e($client->nom); ?> <?php echo e($client->prenom); ?> (<?php echo e($client->email); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <div class="invalid-feedback"><?php echo e($message); ?></div> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <span>✓</span> Créer le Compte
                    </button>
                    <a href="<?php echo e(route('comptes.index')); ?>" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Programming\Laravel\bank-manager\resources\views/comptes/create.blade.php ENDPATH**/ ?>