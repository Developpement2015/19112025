@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une grève</h1>
    <form action="{{ route('greves.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fonctionnaire_id" class="form-label">Fonctionnaire</label>
            <select name="fonctionnaire_id" id="fonctionnaire_id" class="form-select" required>
                <option value="">Choisir...</option>
                @foreach($fonctionnaires as $fonctionnaire)
                    <option value="{{ $fonctionnaire->id }}">{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_debut" class="form-label">Date début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control">
        </div>
        <div class="mb-3">
            <label for="remarque" class="form-label">Remarque</label>
            <textarea name="remarque" id="remarque" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('greves.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection 