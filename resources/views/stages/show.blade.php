<x-head titre="Détails du Stage" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Détails de la Demande de Stage</h4>
                    <h6 class="text-capitalize text-muted">{{ $stage->nom_prenom }}</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route('stages.index') }}" class="btn btn-secondary me-2">
                    <i data-feather="arrow-left" class="me-2"></i> Retour à la liste
                </a>
                <a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-primary">
                    <i data-feather="edit" class="me-2"></i> Modifier
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Informations personnelles -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="form-title text-primary">
                                    <i class="fas fa-user me-2"></i>Informations Personnelles
                                </h5>
                                <hr>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nom et Prénom:</label>
                                    <p class="form-control-static">{{ $stage->nom_prenom }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">CIN:</label>
                                    <p class="form-control-static">{{ $stage->cin }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Informations académiques -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="form-title text-primary">
                                    <i class="fas fa-graduation-cap me-2"></i>Informations Académiques
                                </h5>
                                <hr>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">École:</label>
                                    <p class="form-control-static">
                                        <span class="badge bg-info">{{ $stage->ecole->nom }}</span>
                                        <br><small class="text-muted">{{ $stage->ecole->nom_arabe }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Spécialité/Option:</label>
                                    <p class="form-control-static">
                                        <span class="badge bg-primary">{{ $stage->option->nom }}</span>
                                        <br><small class="text-muted">{{ $stage->option->nom_arabe }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Détails de l'Institut:</label>
                                    <p class="form-control-static">{{ $stage->institut_details }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Informations du stage -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="form-title text-primary">
                                    <i class="fas fa-calendar-alt me-2"></i>Informations du Stage
                                </h5>
                                <hr>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Date de Début:</label>
                                    <p class="form-control-static">{{ $stage->date_debut->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Date de Fin:</label>
                                    <p class="form-control-static">{{ $stage->date_fin->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Durée:</label>
                                    <p class="form-control-static">{{ $stage->duree }} jours</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Cadre:</label>
                                    <p class="form-control-static">
                                        <span class="badge {{ $stage->cadre === 'médical' ? 'bg-success' : 'bg-info' }}">
                                            {{ ucfirst($stage->cadre) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Type de Stage:</label>
                                    <p class="form-control-static">
                                        <span class="badge {{ $stage->type_stage === 'formation' ? 'bg-primary' : 'bg-secondary' }}">
                                            {{ ucfirst($stage->type_stage) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Lieu et encadrement -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="form-title text-primary">
                                    <i class="fas fa-hospital me-2"></i>Lieu et Encadrement
                                </h5>
                                <hr>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Formation Sanitaire:</label>
                                    <p class="form-control-static">
                                        <span class="badge bg-success">{{ $stage->formationSanitaire->nom }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Service:</label>
                                    <p class="form-control-static">
                                        <span class="badge bg-warning">{{ $stage->service->nom }}</span>
                                        <br><small class="text-muted">{{ $stage->service->nom_arabe }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Encadrant:</label>
                                    <p class="form-control-static">
                                        <strong>{{ $stage->encadrant->nom }}</strong>
                                        <br><small class="text-muted">{{ $stage->encadrant->fonction }}</small>
                                        <br><small class="text-muted">{{ $stage->encadrant->nom_arabe }} - {{ $stage->encadrant->fonction_arabe }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Hiérarchie:</label>
                                    <p class="form-control-static">{{ $stage->hierarchie }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Avis et statut -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="form-title text-primary">
                                    <i class="fas fa-clipboard-check me-2"></i>Avis et Statut
                                </h5>
                                <hr>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Statut de l'Attestation:</label>
                                    <p class="form-control-static">
                                        @php
                                            $badgeClass = match($stage->statut_attestation) {
                                                'traité' => 'bg-success',
                                                'en cours' => 'bg-warning',
                                                'pas en cours' => 'bg-danger',
                                                default => 'bg-secondary'
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($stage->statut_attestation) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Date de Création:</label>
                                    <p class="form-control-static">{{ $stage->created_at->format('d/m/Y à H:i') }}</p>
                                </div>
                            </div>
                            @if($stage->avis)
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Avis:</label>
                                    <div class="alert alert-info">
                                        {{ $stage->avis }}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-primary me-2">
                                        <i class="fas fa-edit me-2"></i>Modifier
                                    </a>
                                    <a href="{{ route('stages.attestation', $stage->id) }}" target="_blank" class="btn btn-warning me-2">
                                        <i class="fas fa-print me-2"></i>Attestation de stage
                                    </a>
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete({{ $stage->id }}, '{{ route('stages.destroy', $stage->id) }}', '{{ $stage->nom_prenom }}', 'êtes-vous sûr de vouloir supprimer ce stage?')">
                                        <i class="fas fa-trash me-2"></i>Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-foot />
