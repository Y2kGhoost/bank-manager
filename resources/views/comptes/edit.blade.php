@extends('layout.app')

@section('content')
<div class="container">
    <div class="card" data-aos="fade-up">
        <div class="card-header">
            <h3 class="card-header-title">
                <span class="header-icon"></span>
                Modifier le Compte Bancaire
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('comptes.update', $compte) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="rib" class="form-label">RIB (Relevé d'Identité Bancaire) *</label>
                    <input type="text" name="rib" id="rib" 
                           class="form-control @error('rib') is-invalid @enderror" 
                           value="{{ old('rib', $compte->rib) }}" placeholder="Ex: MA123456789012345678901234" required>
                    @error('rib')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="solde" class="form-label">Solde (DH) *</label>
                    <input type="number" step="0.01" name="solde" id="solde" 
                           class="form-control @error('solde') is-invalid @enderror" 
                           value="{{ old('solde', $compte->solde) }}" placeholder="0.00" min="0" required>
                    @error('solde')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="client_id" class="form-label">Client Propriétaire *</label>
                    <select name="client_id" id="client_id" 
                            class="form-control @error('client_id') is-invalid @enderror" required>
                        <option value="">-- Sélectionnez un client --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" 
                                    {{ old('client_id', $compte->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->nom }} {{ $client->prenom }} ({{ $client->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> Enregistrer les Modifications
                    </button>
                    <a href="{{ route('comptes.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection