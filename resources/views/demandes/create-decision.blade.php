<x-head titre="Créer Décision" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Créer une Décision</h4>
                    <h6>Demande #{{ $demande->id }} - {{ $demande->nom }} {{ $demande->prenom }}</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </li>
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informations de la Demande</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Fonctionnaire:</strong> {{ $demande->nom }} {{ $demande->prenom }}</p>
                                <p><strong>CIN:</strong> {{ $demande->cin }}</p>
                                <p><strong>PPR:</strong> {{ $demande->ppr }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Type de demande:</strong>
                                    @if($demande->type_demande === 'conge')
                                        <span class="badge bg-success">Congé</span>
                                    @elseif($demande->type_demande === 'attestation')
                                        <span class="badge bg-primary">Attestation</span>
                                    @else
                                        <span class="badge bg-warning">Autre</span>
                                    @endif
                                </p>
                                <p><strong>Statut:</strong>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> Approuvé (Niveau {{ $demande->approval_level }}/4)
                                    </span>
                                </p>
                            </div>
                        </div>

                        @if($demande->type_demande === 'conge' && $demande->data)
                            @php
                                $data = is_string($demande->data) ? json_decode($demande->data, true) : $demande->data;
                            @endphp
                            @if($data && is_array($data))
                                <div class="alert alert-info">
                                    <h6>Détails du congé:</h6>
                                    <p class="mb-1"><strong>Date début:</strong> {{ $data['date_debut'] ?? '-' }}</p>
                                    <p class="mb-1"><strong>Date fin:</strong> {{ $data['date_fin'] ?? '-' }}</p>
                                    @if(!empty($data['lieu_passage']))
                                        <p class="mb-1"><strong>Lieu de passage:</strong> {{ $data['lieu_passage'] }}</p>
                                    @endif
                                    @if(!empty($data['adresse']))
                                        <p class="mb-1"><strong>Adresse:</strong> {{ $data['adresse'] }}</p>
                                    @endif
                                    @if(!empty($data['remplacant']))
                                        <p class="mb-0"><strong>Remplaçant:</strong> {{ $data['remplacant'] }}</p>
                                    @endif
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fas fa-file-signature"></i> Formulaire de Décision
                        </h5>

                        <form method="POST" action="{{ route('demandes.store-decision', $demande) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="numero_decision" class="form-label">
                                    Numéro de Décision <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('numero_decision') is-invalid @enderror"
                                    id="numero_decision"
                                    name="numero_decision"
                                    value="{{ old('numero_decision') }}"
                                    placeholder="Ex: DEC-2025-001"
                                    required
                                >
                                @error('numero_decision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Format suggéré: DEC-ANNÉE-NUMÉRO</small>
                            </div>

                            <div class="mb-3">
                                <label for="fichier_decision" class="form-label">
                                    Fichier de Décision (PDF) (Optionnel)
                                </label>
                                <input
                                    type="file"
                                    class="form-control @error('fichier_decision') is-invalid @enderror"
                                    id="fichier_decision"
                                    name="fichier_decision"
                                    accept=".pdf"
                                >
                                @error('fichier_decision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Formats acceptés: PDF uniquement. Taille max: 5 Mo
                                </small>
                            </div>

                            <div class="mb-3">
                                <label for="observations" class="form-label">
                                    Observations (Optionnel)
                                </label>
                                <textarea
                                    class="form-control @error('observations') is-invalid @enderror"
                                    id="observations"
                                    name="observations"
                                    rows="3"
                                    placeholder="Remarques ou observations supplémentaires..."
                                >{{ old('observations') }}</textarea>
                                @error('observations')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Créer la Décision
                                </button>
                                <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-foot />
