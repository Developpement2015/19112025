@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Grèves</h1>
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('greves.create') }}" class="btn btn-primary">Ajouter une grève</a>
        <form method="POST" action="{{ route('greves.export-all-excel') }}" target="_blank">
            @csrf
            <button type="submit" class="btn btn-success">Export Excel Listes Grèves</button>
        </form>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fonctionnaire</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Remarque</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($greves as $greve)
                <tr>
                    <td>{{ $greve->fonctionnaire->nom ?? '' }} {{ $greve->fonctionnaire->prenom ?? '' }}</td>
                    <td>{{ $greve->date_debut }}</td>
                    <td>{{ $greve->date_fin }}</td>
                    <td>{{ $greve->remarque }}</td>
                    <td>
                        <a href="{{ route('greves.show', $greve) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('greves.edit', $greve) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('greves.destroy', $greve) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette grève ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $greves->links() }}
</div>
@endsection
