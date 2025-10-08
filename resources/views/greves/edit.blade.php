@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la grève</h1>
    <form action="{{ route('greves.update', $greve) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fonctionnaire_id" class="form-label">Fonctionnaire</label>
            <select name="fonctionnaire_id" id="fonctionnaire_id" class="form-select" required>
                <option value="">Choisir...</option>
                @foreach($fonctionnaires as $fonctionnaire)
                    <option value="{{ $fonctionnaire->id }}" @if($greve->fonctionnaire_id == $fonctionnaire->id) selected @endif>{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_debut" class="form-label">Date début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $greve->date_debut }}" required>
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $greve->date_fin }}">
        </div>
        <div class="mb-3">
            <label for="remarque" class="form-label">Remarque</label>
            <textarea name="remarque" id="remarque" class="form-control">{{ $greve->remarque }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('greves.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection 