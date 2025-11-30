@extends('layout.app')

@section('content')
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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>✓ Succès!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Message erreur -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>⚠️ Erreur!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('virement.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="compte_source_id" class="form-label">Compte Émetteur (Source) *</label>
                    <select name="compte_source_id" id="compte_source_id" 
                            class="form-control @error('compte_source_id') is-invalid @enderror" required>
                        <option value="">-- Sélectionnez le compte émetteur --</option>
                        @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}" {{ old('compte_source_id') == $compte->id ? 'selected' : '' }}>
                                RIB: {{ $compte->rib }} | {{ $compte->client->nom }} {{ $compte->client->prenom }} | Solde: {{ number_format($compte->solde, 2) }} DH
                            </option>
                        @endforeach
                    </select>
                    @error('compte_source_id') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="compte_destination_id" class="form-label">Compte Bénéficiaire (Destination) *</label>
                    <select name="compte_destination_id" id="compte_destination_id" 
                            class="form-control @error('compte_destination_id') is-invalid @enderror" required>
                        <option value="">-- Sélectionnez le compte bénéficiaire --</option>
                        @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}" {{ old('compte_destination_id') == $compte->id ? 'selected' : '' }}>
                                RIB: {{ $compte->rib }} | {{ $compte->client->nom }} {{ $compte->client->prenom }} | Solde: {{ number_format($compte->solde, 2) }} DH
                            </option>
                        @endforeach
                    </select>
                    @error('compte_destination_id') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="montant" class="form-label">Montant du Virement (DH) *</label>
                    <input type="number" step="0.01" name="montant" id="montant"
                           class="form-control @error('montant') is-invalid @enderror" 
                           value="{{ old('montant') }}" placeholder="0.00" min="0.01" required>
                    @error('montant') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                    <small class="form-text text-muted">Le montant doit être inférieur ou égal au solde du compte émetteur.</small>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-success">
                        <span>✓</span> Effectuer le Virement
                    </button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection