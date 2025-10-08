@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détail de la grève</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Fonctionnaire</h5>
            <p class="card-text">{{ $greve->fonctionnaire->nom ?? '' }} {{ $greve->fonctionnaire->prenom ?? '' }}</p>
            <h5 class="card-title">Date début</h5>
            <p class="card-text">{{ $greve->date_debut }}</p>
            <h5 class="card-title">Date fin</h5>
            <p class="card-text">{{ $greve->date_fin }}</p>
            <h5 class="card-title">Remarque</h5>
            <p class="card-text">{{ $greve->remarque }}</p>
            <a href="{{ route('greves.index') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
</div>
@endsection 