@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Faire un Virement</h1>

    <!-- Message succès -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Message erreur -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('virement.store') }}" method="POST">
        @csrf

        <!-- Compte source -->
        <div class="mb-3">
            <label class="form-label">Compte Émetteur</label>
            <select name="compte_source_id" class="form-control @error('compte_source_id') is-invalid @enderror" required>
                <option value="">-- Choisir un compte --</option>
                @foreach($comptes as $compte)
                    <option value="{{ $compte->id }}" {{ old('compte_source_id') == $compte->id ? 'selected' : '' }}>
                        {{ $compte->rib }} ({{ $compte->client->nom }} {{ $compte->client->prenom }}) - Solde: {{ number_format($compte->solde, 2) }} DH
                    </option>
                @endforeach
            </select>
            @error('compte_source_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Compte destination -->
        <div class="mb-3">
            <label class="form-label">Compte Bénéficiaire</label>
            <select name="compte_destination_id" class="form-control @error('compte_destination_id') is-invalid @enderror" required>
                <option value="">-- Choisir un compte --</option>
                @foreach($comptes as $compte)
                    <option value="{{ $compte->id }}" {{ old('compte_destination_id') == $compte->id ? 'selected' : '' }}>
                        {{ $compte->rib }} ({{ $compte->client->nom }} {{ $compte->client->prenom }}) - Solde: {{ number_format($compte->solde, 2) }} DH
                    </option>
                @endforeach
            </select>
            @error('compte_destination_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Montant -->
        <div class="mb-3">
            <label class="form-label">Montant (DH)</label>
            <input type="number" step="0.01" name="montant" 
                   class="form-control @error('montant') is-invalid @enderror" 
                   value="{{ old('montant') }}" required>
            @error('montant') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Boutons -->
        <button type="submit" class="btn btn-success">Effectuer le virement</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection