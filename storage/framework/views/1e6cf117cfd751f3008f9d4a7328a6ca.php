<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card" data-aos="fade-up">
        <div class="card-header">
            <h3 class="card-header-title">
                <span class="header-icon">💸</span>
                Effectuer un Virement Bancaire
            </h3>
        </div>
        <div class="card-body">
            <!-- Message succès -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>✓ Succès!</strong> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Message erreur -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <strong>⚠️ Erreur!</strong>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('virement.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label for="compte_source_id" class="form-label">Compte Émetteur (Source) *</label>
                    <select name="compte_source_id" id="compte_source_id" 
                            class="form-control <?php $__errorArgs = ['compte_source_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">-- Sélectionnez le compte émetteur --</option>
                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($compte->id); ?>" <?php echo e(old('compte_source_id') == $compte->id ? 'selected' : ''); ?>>
                                RIB: <?php echo e($compte->rib); ?> | <?php echo e($compte->client->nom); ?> <?php echo e($compte->client->prenom); ?> | Solde: <?php echo e(number_format($compte->solde, 2)); ?> DH
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['compte_source_id'];
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
                    <label for="compte_destination_id" class="form-label">Compte Bénéficiaire (Destination) *</label>
                    <select name="compte_destination_id" id="compte_destination_id" 
                            class="form-control <?php $__errorArgs = ['compte_destination_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">-- Sélectionnez le compte bénéficiaire --</option>
                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($compte->id); ?>" <?php echo e(old('compte_destination_id') == $compte->id ? 'selected' : ''); ?>>
                                RIB: <?php echo e($compte->rib); ?> | <?php echo e($compte->client->nom); ?> <?php echo e($compte->client->prenom); ?> | Solde: <?php echo e(number_format($compte->solde, 2)); ?> DH
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['compte_destination_id'];
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
                    <label for="montant" class="form-label">Montant du Virement (DH) *</label>
                    <input type="number" step="0.01" name="montant" id="montant"
                           class="form-control <?php $__errorArgs = ['montant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('montant')); ?>" placeholder="0.00" min="0.01" required>
                    <?php $__errorArgs = ['montant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <div class="invalid-feedback"><?php echo e($message); ?></div> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text text-muted">Le montant doit être inférieur ou égal au solde du compte émetteur.</small>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-success">
                        <span>✓</span> Effectuer le Virement
                    </button>
                    <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Administrator\Desktop\Programming\Laravel\bank-manager\resources\views/virement/create.blade.php ENDPATH**/ ?>