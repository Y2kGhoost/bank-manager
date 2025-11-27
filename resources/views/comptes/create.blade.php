@extends('layout.app')

@section('content')
<div class="container">
    <h1>Ajouter un Compte</h1>

    <form action="{{ route('comptes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>RIB</label>
            <input type="text" name="rib" class="form-control @error('rib') is-invalid @enderror" value="{{ old('rib') }}">
            @error('rib') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Solde initial</label>
            <input type="number" step="0.01" name="solde" class="form-control @error('solde') is-invalid @enderror" value="{{ old('solde', 0) }}">
            @error('solde') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Client</label>
            <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                <option value="">-- Choisir un client --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
            @error('client_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('comptes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection