@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le Compte Bancaire</h1>

    <form action="{{ route('comptes.update', $compte) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- RIB -->
        <div class="mb-3">
            <label for="rib" class="form-label">RIB</label>
            <input type="text" name="rib" id="rib" 
                   class="form-control @error('rib') is-invalid @enderror" 
                   value="{{ old('rib', $compte->rib) }}" required>
            @error('rib')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Solde -->
        <div class="mb-3">
            <label for="solde" class="form-label">Solde (DH)</label>
            <input type="number" step="0.01" name="solde" id="solde" 
                   class="form-control @error('solde') is-invalid @enderror" 
                   value="{{ old('solde', $compte->solde) }}" required>
            @error('solde')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Client -->
        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" 
                    class="form-control @error('client_id') is-invalid @enderror" required>
                <option value="">-- Choisir un client --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" 
                            {{ old('client_id', $compte->client_id) == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
            @error('client_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Boutons -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('comptes.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection