@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Clients</h1>

    <!-- Boutons d'action -->
    <div class="mb-3">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Ajouter un Client</a>
        <a href="{{ route('comptes.index') }}" class="btn btn-secondary ms-2">Voir les Comptes</a>
        <a href="{{ route('virement.create') }}" class="btn btn-success ms-2">Faire un Virement</a>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tableau des clients -->
    @if($clients->count() > 0)
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td><strong>{{ $client->id }}</strong></td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                            Modifier
                        </a>

                        <!-- Bouton Supprimer -->
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Supprimer ce client ? Tous ses comptes seront aussi supprimés.')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">
            Aucun client trouvé. 
            <a href="{{ route('clients.create') }}">Ajouter le premier client</a>
        </div>
    @endif
</div>
@endsection