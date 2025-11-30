@extends('layout.app')

@section('content')
<div class="container">
    <div class="card" data-aos="fade-up">
        <div class="card-header">
            <h3 class="card-header-title">
                <span class="header-icon">✏️</span>
                Modifier le Client
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nom" class="form-label">Nom *</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" 
                           value="{{ old('nom', $client->nom) }}" placeholder="Entrez le nom du client" required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="prenom" class="form-label">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" 
                           value="{{ old('prenom', $client->prenom) }}" placeholder="Entrez le prénom du client" required>
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $client->email) }}" placeholder="exemple@email.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> Enregistrer les Modifications
                    </button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection