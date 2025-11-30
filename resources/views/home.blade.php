@extends('layout.app')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section" data-aos="fade-up">
    <div class="hero-content">
        <div class="hero-badge" data-aos="fade-down" data-aos-delay="100">
            <span class="badge-icon"></span>
            <span>Application Bancaire Moderne</span>
        </div>
        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">
            BankApp
        </h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300">
            Gestion Intelligente et Sécurisée des Comptes Bancaires
        </p>
        <p class="hero-description" data-aos="fade-up" data-aos-delay="400">
            Une solution complète pour gérer vos clients, leurs comptes et effectuer des virements en toute simplicité
        </p>
        
        <!-- MENU PRINCIPAL -->
        <div class="hero-menu" data-aos="fade-up" data-aos-delay="500">
            <div class="menu-grid">
                <a href="{{ route('clients.index') }}" class="menu-card menu-card-primary">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="menu-title">Gestion des Clients</h3>
                    <p class="menu-description">Ajouter, modifier et gérer vos clients bancaires</p>
                    <span class="menu-arrow">→</span>
                </a>

                <a href="{{ route('comptes.index') }}" class="menu-card menu-card-blue">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="menu-title">Gestion des Comptes</h3>
                    <p class="menu-description">Consulter et administrer tous les comptes bancaires</p>
                    <span class="menu-arrow">→</span>
                </a>

                <a href="{{ route('virement.create') }}" class="menu-card menu-card-success">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="menu-title">Effectuer un Virement</h3>
                    <p class="menu-description">Transférer des fonds entre comptes en toute sécurité</p>
                    <span class="menu-arrow">→</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection