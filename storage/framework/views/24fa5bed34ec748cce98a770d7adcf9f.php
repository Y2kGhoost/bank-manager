

<?php $__env->startSection('content'); ?>
<!-- HERO SECTION -->
<section class="relative overflow-hidden py-20 px-6 text-center bg-linear-to-br from-purple-600 via-pink-500 to-red-500" data-aos="fade-up">
    <div class="relative z-10 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-lg">
            BankApp
        </h1>
        <p class="text-xl md:text-2xl text-white mb-8 font-light opacity-90">
            Gestion Intelligente des Comptes Bancaires
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('clients.index')); ?>" 
               class="btn btn-primary px-8 py-4 rounded-full font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 mb-10">
                Gérer les Clients
            </a>
            <a href="<?php echo e(route('virement.create')); ?>" 
               class="btn btn-success px-8 py-4 rounded-full font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 mb-10">
                Faire un Virement
            </a>
        </div>
    </div>
</section>

<!-- TITRE DU PROJET 
<div class="container mx-auto px-6 py-12 text-center" data-aos="fade-up" data-aos-delay="100">
    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
        Mini-Projet Laravel 2025-2026
    </h2>
    <p class="text-xl text-gray-600">École Supérieure de Technologie de Salé</p>
</div>
-->

<!-- CONTEXTE -->
<div class="container mx-auto px-6 mb-12" data-aos="fade-up" data-aos-delay="200">
    <div class="card">
        <div class="card-header">
            <h3 class="text-2xl font-bold">Contexte</h3>
        </div>
        <div class="card-body p-8">
            <p class="text-gray-700 leading-relaxed">
                Vous êtes chargé de développer une <strong>application web sécurisée</strong> pour la gestion des clients et de leurs comptes bancaires. 
                Cette application doit être réalisée avec le framework <strong>Laravel</strong> et respecter les bonnes pratiques de développement et de sécurité.
            </p>
            <p class="text-gray-700 mt-4 leading-relaxed">
                Cette application permettra à un administrateur de gérer les clients et leurs comptes bancaires, ainsi que d’effectuer des virements entre comptes. 
                Le projet est conçu pour renforcer vos compétences en développement web PHP orienté objet avec Laravel, en explorant aussi les concepts avancés de la programmation.
            </p>
        </div>
    </div>
</div>

<!-- OBJECTIFS PÉDAGOGIQUES -->
<div class="container mx-auto px-6 mb-12" data-aos="fade-up" data-aos-delay="300">
    <div class="card">
        <div class="card-header">
            <h3 class="text-2xl font-bold">Objectifs Pédagogiques</h3>
        </div>
        <div class="card-body p-8">
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-start"><span class="text-green-500 mr-3 text-xl">Check</span> Maîtriser le développement d’applications web avec Laravel</li>
                <li class="flex items-start"><span class="text-green-500 mr-3 text-xl">Check</span> Comprendre et appliquer les Design Patterns courants en PHP</li>
                <li class="flex items-start"><span class="text-green-500 mr-3 text-xl">Check</span> Utiliser Eloquent ORM pour la modélisation et l’accès aux données</li>
                <li class="flex items-start"><span class="text-green-500 mr-3 text-xl">Check</span> Gérer les requêtes HTTP, les routes et la sécurité (CSRF)</li>
                <li class="flex items-start"><span class="text-green-500 mr-3 text-xl">Check</span> Implémenter des opérations CRUD et des relations entre modèles</li>
            </ul>
        </div>
    </div>
</div>

<!-- FONCTIONNALITÉS -->
<div class="container mx-auto px-6 mb-12" data-aos="fade-up" data-aos-delay="400">
    <h3 class="text-3xl font-bold text-center text-gray-800 mb-10">Fonctionnalités Attendues</h3>
    
    <div class="grid md:grid-cols-3 gap-8 row">
        <!-- Gestion Clients -->
        <div class="card col-sm" data-aos="zoom-in">
            <div class="card-body p-8 text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="svg-image w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H9v-1a4 4 0 014-4h4a4 4 0 014 4v1z"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-purple-700 mb-3">1. Gestion des Clients</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Ajouter, modifier, supprimer et afficher les clients.</li>
                    <li>Un client est défini par : <strong>id, nom, prénom, email</strong>.</li>
                </ul>
            </div>
        </div>

        <!-- Gestion Comptes -->
        <div class="card col-sm" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-body p-8 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="svg-image w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-blue-700 mb-3">2. Gestion des Comptes</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Ajouter, modifier, supprimer et afficher les comptes.</li>
                    <li>Un compte est défini par : <strong>id, RIB, solde, client_id</strong>.</li>
                    <li>Un client peut avoir plusieurs comptes.</li>
                    <li>Un compte appartient à un seul client.</li>
                </ul>
            </div>
        </div>

        <!-- Virements -->
        <div class="card col-sm" data-aos="zoom-in" data-aos-delay="200">
            <div class="card-body p-8 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="svg-image w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18m-6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-1m6-4V5a3 3 0 013-3h6a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-green-700 mb-3">3. Gestion des Virements</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Réaliser un virement entre deux comptes.</li>
                    <li>Vérifier que le solde du compte émetteur est suffisant.</li>
                    <li>Afficher un message d’erreur en cas de solde insuffisant.</li>
                    <li>Mettre à jour les soldes des comptes concernés.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- AUTEUR -->
<div class="container mx-auto px-6 py-16 text-center" data-aos="fade-up">
    <div class="inline-block bg-linear-to-r from-purple-600 to-pink-600 text-white p-8 rounded-2xl shadow-2xl">
        <h3 class="text-2xl font-bold mb-2">Réalisé par</h3>
        <p class="text-3xl font-bold">Gueddari Ilyass</p>
        <p class="text-lg mt-2">Étudiant en Développement Digital</p>
        <p class="text-sm mt-4 opacity-90">École Supérieure de Technologie de Salé - 2025/2026</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Desktop\Programation\Laravel\bank-manager\resources\views/home.blade.php ENDPATH**/ ?>