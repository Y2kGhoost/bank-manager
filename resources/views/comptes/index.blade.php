@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
        <h1 class="mb-0">Gestion des Comptes Bancaires</h1>
        <a href="{{ route('comptes.create') }}" class="btn btn-primary">
            <span></span> Ajouter un Compte
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($comptes->count() > 0)
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>RIB</th>
                    <th>Solde</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comptes as $compte)
                <tr>
                    <td>{{ $compte->id }}</td>
                    <td><strong>{{ $compte->rib }}</strong></td>
                    <td>{{ number_format($compte->solde, 2) }} DH</td>
                    <td>{{ $compte->client->nom }} {{ $compte->client->prenom }}</td>
                    <td>
                        <a href="{{ route('comptes.edit', $compte) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('comptes.destroy', $compte) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Supprimer ce compte ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Aucun compte. <a href="{{ route('comptes.create') }}">Ajouter le premier</a></div>
    @endif
</div>
@endsection