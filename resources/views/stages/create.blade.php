<x-head titre="Ajouter un Stage" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Ajouter une Demande de Stage</h4>
                    <h6 class="text-capitalize text-muted">Nouveau Stage</h6>
                </div>
            </div>
            <div class="page-btn">
                <a href="{{ route('stages.index') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left" class="me-2"></i> Retour à la liste
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('stages.store') }}" method="POST">
                    @csrf

                    <!-- Informations personnelles -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="form-title">Informations Personnelles</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="nom_prenom">Nom et Prénom <span class="text-danger">*</span></label>
                                <input type="text" name="nom_prenom" id="nom_prenom"
                                    placeholder="Nom et Prénom" required class="form-control" value="{{ old('nom_prenom') }}">
                                @error('nom_prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="cin">CIN <span class="text-danger">*</span></label>
                                <input type="text" name="cin" id="cin"
                                    placeholder="CIN" required class="form-control" value="{{ old('cin') }}">
                                @error('cin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informations académiques -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="form-title">Informations Académiques</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="ecole_id">École <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="ecole_id" id="ecole_id" required class="form-control">
                                        <option value="">Sélectionner une école</option>
                                        @foreach($ecoles as $ecole)
                                            <option value="{{ $ecole->id }}" {{ old('ecole_id') == $ecole->id ? 'selected' : '' }}>
                                                {{ $ecole->nom }} - {{ $ecole->nom_arabe }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageEcolesModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('ecole_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="option_id">Spécialité/Option <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="option_id" id="option_id" required class="form-control">
                                        <option value="">Sélectionner une option</option>
                                        @foreach($options as $option)
                                            <option value="{{ $option->id }}" {{ old('option_id') == $option->id ? 'selected' : '' }}>
                                                {{ $option->nom }} - {{ $option->nom_arabe }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageOptionsModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('option_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="institut_details">Détails de l'Institut <span class="text-danger">*</span></label>
                                <textarea name="institut_details" id="institut_details" rows="3"
                                    placeholder="Détails sur l'institut, niveau d'études, etc." required class="form-control">{{ old('institut_details') }}</textarea>
                                @error('institut_details')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informations du stage -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="form-title">Informations du Stage</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="date_debut">Date de Début <span class="text-danger">*</span></label>
                                <input type="date" name="date_debut" id="date_debut"
                                    required class="form-control" value="{{ old('date_debut') }}">
                                @error('date_debut')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="date_fin">Date de Fin <span class="text-danger">*</span></label>
                                <input type="date" name="date_fin" id="date_fin"
                                    required class="form-control" value="{{ old('date_fin') }}">
                                @error('date_fin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="duree">Durée (en jours) <span class="text-danger">*</span></label>
                                <input type="number" name="duree" id="duree" min="1"
                                    placeholder="Durée en jours" required class="form-control" value="{{ old('duree') }}">
                                @error('duree')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="cadre">Cadre <span class="text-danger">*</span></label>
                                <select name="cadre" id="cadre" required class="form-control">
                                    <option value="">Sélectionner un cadre</option>
                                    <option value="médical" {{ old('cadre') == 'médical' ? 'selected' : '' }}>Médical</option>
                                    <option value="administratif" {{ old('cadre') == 'administratif' ? 'selected' : '' }}>Administratif</option>
                                </select>
                                @error('cadre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="type_stage_id">Type de Stage <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="type_stage_id" id="type_stage_id" required class="form-control">
                                        <option value="">Sélectionner un type</option>
                                        @foreach($typeStages as $typeStage)
                                            <option value="{{ $typeStage->id }}" {{ old('type_stage_id') == $typeStage->id ? 'selected' : '' }}>
                                                {{ $typeStage->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageTypeStagesModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('type_stage_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Lieu et encadrement -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="form-title">Lieu et Encadrement</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="formation_sanitaire_id">Formation Sanitaire <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="formation_sanitaire_id" id="formation_sanitaire_id" required class="form-control">
                                        <option value="">Sélectionner une formation sanitaire</option>
                                        @foreach($formationSanitaires as $formation)
                                            <option value="{{ $formation->id }}" {{ old('formation_sanitaire_id') == $formation->id ? 'selected' : '' }}>
                                                {{ $formation->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageFormationsModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('formation_sanitaire_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="service_id">Service <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="service_id" id="service_id" required class="form-control">
                                        <option value="">Sélectionner un service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                {{ $service->nom }} - {{ $service->nom_arabe }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageServicesModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('service_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="encadrant_id">Encadrant <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="encadrant_id" id="encadrant_id" required class="form-control">
                                        <option value="">Sélectionner un encadrant</option>
                                        @foreach($encadrants as $encadrant)
                                            <option value="{{ $encadrant->id }}" {{ old('encadrant_id') == $encadrant->id ? 'selected' : '' }}>
                                                {{ $encadrant->nom }} - {{ $encadrant->fonction }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageEncadrantsModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('encadrant_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="intitule_formation_id">Intitulé Formation <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="intitule_formation_id" id="intitule_formation_id" required class="form-control">
                                        <option value="">Sélectionner un intitulé de formation</option>
                                        @foreach($intituleFormations as $intitule)
                                            <option value="{{ $intitule->id }}" {{ old('intitule_formation_id') == $intitule->id ? 'selected' : '' }}>
                                                {{ $intitule->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#manageIntituleFormationsModal">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @error('intitule_formation_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Hiérarchie -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="hierarchie">Hiérarchie <span class="text-danger">*</span></label>
                                <input type="text" name="hierarchie" id="hierarchie"
                                    placeholder="Ex: Directeur Régional de la Santé" required class="form-control" value="{{ old('hierarchie') }}">
                                @error('hierarchie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Avis et statut -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="form-title">Avis et Statut</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="statut_attestation">Statut de l'Attestation</label>
                                <select name="statut_attestation" id="statut_attestation" class="form-control">
                                    <option value="en cours" {{ old('statut_attestation', 'en cours') == 'en cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="traité" {{ old('statut_attestation') == 'traité' ? 'selected' : '' }}>Traité</option>
                                    <option value="pas en cours" {{ old('statut_attestation') == 'pas en cours' ? 'selected' : '' }}>Pas en cours</option>
                                </select>
                                @error('statut_attestation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="avis">Avis</label>
                                <textarea name="avis" id="avis" rows="3"
                                    placeholder="Avis sur le stage (optionnel)" class="form-control">{{ old('avis') }}</textarea>
                                @error('avis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer-btn">
                        <a href="{{ route('stages.index') }}" class="btn btn-cancel me-2">Annuler</a>
                        <button type="submit" class="btn btn-submit">Ajouter le Stage</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<x-stage-modals />

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeStageSelect = document.getElementById('type_stage');
    const autreTypeContainer = document.getElementById('autre_type_stage_container');
    const autreTypeInput = document.getElementById('autre_type_stage');

    // Vérifier que tous les éléments existent
    if (!typeStageSelect || !autreTypeContainer || !autreTypeInput) {
        console.error('Éléments manquants pour la gestion du type de stage');
        return;
    }

    function toggleAutreTypeField() {
        console.log('toggleAutreTypeField appelée, valeur:', typeStageSelect.value);

        if (typeStageSelect.value === 'autre') {
            console.log('Affichage du champ autre type');
            autreTypeContainer.style.display = 'block';
            autreTypeInput.required = true;
        } else {
            console.log('Masquage du champ autre type');
            autreTypeContainer.style.display = 'none';
            autreTypeInput.required = false;
            autreTypeInput.value = '';
        }
    }

    // Écouter les changements sur le select
    typeStageSelect.addEventListener('change', toggleAutreTypeField);

    // Vérifier l'état initial (pour les cas de validation échouée avec old values)
    toggleAutreTypeField();

    // Boutons de test temporaires
    const testButton = document.getElementById('testShowField');
    if (testButton) {
        testButton.addEventListener('click', function() {
            console.log('Test: Forçage de l\'affichage du champ avec JS');
            autreTypeContainer.style.display = 'block';
            autreTypeContainer.style.visibility = 'visible';
            autreTypeInput.style.display = 'block';
            autreTypeInput.style.visibility = 'visible';
            alert('Champ forcé à s\'afficher avec JS. Vérifiez s\'il est visible.');
        });
    }

    const testCSSButton = document.getElementById('testShowCSS');
    if (testCSSButton) {
        testCSSButton.addEventListener('click', function() {
            console.log('Test: Forçage de l\'affichage du champ avec CSS');
            document.body.classList.add('show-autre-field');
            alert('Classe CSS ajoutée. Vérifiez si le champ vert est visible.');
        });
    }

    const testSelectButton = document.getElementById('testSelectAutre');
    if (testSelectButton) {
        testSelectButton.addEventListener('click', function() {
            console.log('Test: Sélection automatique de "Autre"');
            typeStageSelect.value = 'autre';
            typeStageSelect.dispatchEvent(new Event('change'));
            alert('Option "Autre" sélectionnée automatiquement.');
        });
    }
});

// Version alternative avec jQuery si disponible
$(document).ready(function() {
    console.log('jQuery version du script chargée');

    $('#type_stage').on('change', function() {
        console.log('jQuery: Changement détecté, valeur:', $(this).val());

        if ($(this).val() === 'autre') {
            console.log('jQuery: Affichage du champ autre');
            $('#autre_type_stage_container').show();
            $('#autre_type_stage').prop('required', true);
        } else {
            console.log('jQuery: Masquage du champ autre');
            $('#autre_type_stage_container').hide();
            $('#autre_type_stage').prop('required', false).val('');
        }
    });

    // Déclencher le changement initial
    $('#type_stage').trigger('change');
});
</script>

<style>
/* CSS pour tester l'affichage du champ autre type */
#type_stage[value="autre"] ~ #autre_type_stage_container,
#type_stage option[value="autre"]:checked ~ #autre_type_stage_container {
    display: block !important;
    background-color: yellow;
}

/* Test CSS alternatif */
.show-autre-field #autre_type_stage_container {
    display: block !important;
    background-color: lightgreen;
}
</style>

<x-foot />
