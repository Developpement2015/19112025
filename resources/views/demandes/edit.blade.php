<x-head titre="Modifier la demande" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex justify-content-between align-items-center w-100">
                <div class="page-title">
                    <h4>Modifier la demande #{{ $demande->id }}</h4>
                    <h6 class="text-muted">Édition des informations</h6>
                </div>
                <div>
                    <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Erreurs :</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('demandes.update', $demande) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Informations personnelles -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-user"></i> Informations Personnelles</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" value="{{ old('nom', $demande->nom) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $demande->prenom) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">CIN <span class="text-danger">*</span></label>
                                <input type="text" name="cin" class="form-control" value="{{ old('cin', $demande->cin) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PPR <span class="text-danger">*</span></label>
                                <input type="text" name="ppr" class="form-control" value="{{ old('ppr', $demande->ppr) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email_fonctionnaire" class="form-control"
                                       value="{{ old('email_fonctionnaire', $demande->email_fonctionnaire) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations de la demande -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-file-alt"></i> Informations de la Demande</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Formation Sanitaire</label>
                                <select name="nom_formation_sanitaire_id" class="form-select">
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($formations as $formation)
                                        <option value="{{ $formation->id }}"
                                                {{ old('nom_formation_sanitaire_id', $demande->nom_formation_sanitaire_id) == $formation->id ? 'selected' : '' }}>
                                            {{ $formation->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Type de demande <span class="text-danger">*</span></label>
                                <select name="type_demande" id="type_demande" class="form-select" required disabled>
                                    <option value="conge" {{ old('type_demande', $demande->type_demande) === 'conge' ? 'selected' : '' }}>
                                        Congé
                                    </option>
                                    <option value="attestation" {{ old('type_demande', $demande->type_demande) === 'attestation' ? 'selected' : '' }}>
                                        Attestation de travail
                                    </option>
                                    <option value="autre" {{ old('type_demande', $demande->type_demande) === 'autre' ? 'selected' : '' }}>
                                        Autre
                                    </option>
                                </select>
                                <small class="text-muted">Le type de demande ne peut pas être modifié</small>
                            </div>

                            @php
                                $data = is_string($demande->data) ? json_decode($demande->data, true) : ($demande->data ?? []);
                            @endphp

                            <!-- Champs pour congé -->
                            @if($demande->type_demande === 'conge')
                                <div id="conge_fields">
                                    <div class="mb-3">
                                        <label class="form-label">Date de début</label>
                                        <input type="date" name="data[date_debut]" class="form-control"
                                               value="{{ old('data.date_debut', $data['date_debut'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date de fin</label>
                                        <input type="date" name="data[date_fin]" class="form-control"
                                               value="{{ old('data.date_fin', $data['date_fin'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Lieu de passage</label>
                                        <input type="text" name="data[lieu_passage]" class="form-control"
                                               value="{{ old('data.lieu_passage', $data['lieu_passage'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" name="data[adresse]" class="form-control"
                                               value="{{ old('data.adresse', $data['adresse'] ?? '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Remplaçant</label>
                                        <input type="text" name="data[remplacant]" class="form-control"
                                               value="{{ old('data.remplacant', $data['remplacant'] ?? '') }}">
                                    </div>
                                </div>
                            @elseif($demande->type_demande === 'autre')
                                <div id="autre_fields">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="data[description]" class="form-control" rows="5">{{ old('data.description', $data['description'] ?? '') }}</textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<x-foot />
