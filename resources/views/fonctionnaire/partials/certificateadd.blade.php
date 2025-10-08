<!-- ajouter certificate - modal-->
<div class="modal fade" id="addcertificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter un Certificat</h4>
                            <div class="fonctionnaire-info mt-2 p-2 bg-light rounded">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-primary me-2">PPR: {{ $fonctionnaire->ppr }}</span>
                                    <span class="fw-bold">{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</span>
                                </div>
                                @if($fonctionnaire->nom_arabe || $fonctionnaire->prenom_arabe)
                                <div class="mt-1 text-muted small">
                                    <span dir="rtl" lang="ar" style="font-family: 'Traditional Arabic', Arial, sans-serif;">
                                        {{ $fonctionnaire->nom_arabe }} {{ $fonctionnaire->prenom_arabe }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('certificate.add') }}" method="post" class="certificateaddform"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .certificateaddform label {
                                    color: #333;
                                    font-weight: 700;
                                    font-size: 1.05rem;
                                }
                                .info-box {
                                    background-color: #f8f9fa;
                                    border-left: 4px solid #17a2b8;
                                    padding: 10px;
                                    margin-bottom: 15px;
                                    border-radius: 4px;
                                }
                                .form-control:focus, .form-select:focus {
                                    border-color: #80bdff;
                                    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
                                }
                                .field-title {
                                    display: inline-block;
                                    background-color: #f8f9fa;
                                    padding: 2px 8px;
                                    border-radius: 4px;
                                    margin-bottom: 5px;
                                    border-left: 3px solid #007bff;
                                    font-weight: bold;
                                }
                                .form-control::placeholder, .form-select::placeholder {
                                    color: #aaa;
                                    font-style: italic;
                                }
                                .form-group {
                                    margin-bottom: 1.5rem;
                                }
                                .fonctionnaire-info {
                                    border-left: 4px solid #007bff;
                                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                                }
                                .fonctionnaire-info .badge {
                                    font-size: 0.85rem;
                                }
                            </style>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Informations du Certificat</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Type de Certificat</span>
                                                <label class="form-label" for="type_certificate_id">Sélectionnez le type de certificat</label>
                                                <select name="type_certificate_id" id="type_certificate_id" class="form-select searchable-select">
                                                    <option value="" selected>Choisir un type de certificat</option>
                                                    @foreach (\App\Models\TypeCertificate::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="type_certificate_help" class="form-text">Le type de certificat détermine sa catégorie</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Date de Dépôt</span>
                                                <label class="form-label" for="date_depot">Date à laquelle le certificat a été déposé</label>
                                                <input type="date" name="date_depot" id="date_depot" class="form-control" value="{{ date('Y-m-d') }}">
                                                <div id="date_depot_help" class="form-text">Date de réception du certificat</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Période et Durée</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Date de Début</span>
                                                <label class="form-label" for="date_debut">Date de début du certificat</label>
                                                <input type="date" name="date_debut" id="date_debut" class="form-control">
                                                <div id="date_debut_help" class="form-text">Date à partir de laquelle le certificat est valide</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Nombre de Jours</span>
                                                <label class="form-label" for="jours">Durée du certificat en jours</label>
                                                <input type="number" name="jours" id="jours" placeholder="Nombre de jours"
                                                    class="form-control" min="0" value="1">
                                                <div id="jours_help" class="form-text">Nombre total de jours couverts par le certificat</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Détails Supplémentaires</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Observation</span>
                                                <label class="form-label" for="observation">Remarques ou notes supplémentaires</label>
                                                <textarea name="observation" id="observation" class="form-control" rows="3"
                                                    placeholder="Entrez vos observations concernant ce certificat (optionnel)"></textarea>
                                                <div id="observation_help" class="form-text">Informations complémentaires sur le certificat</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <span class="field-title">Fichier du Certificat</span>
                                                <label class="form-label" for="certificate_file">Joindre une copie du certificat</label>
                                                <input type="file" name="certificate_file" id="certificate_file" class="form-control">
                                                <div id="certificate_file_help" class="form-text">Formats acceptés: PDF, JPG, PNG (max: 5MB)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn d-flex justify-content-end align-items-center mt-4">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary btn-submit">
                                    <i class="fas fa-save me-1"></i> Enregistrer le Certificat
                                </button>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const dateDepotInput = document.getElementById('date_depot');
                                    const dateDebutInput = document.getElementById('date_debut');

                                    // Set date_debut to date_depot by default
                                    dateDepotInput.addEventListener('change', function() {
                                        if (!dateDebutInput.value) {
                                            dateDebutInput.value = dateDepotInput.value;
                                        }
                                    });

                                    // Initialize date_debut with date_depot if empty
                                    if (dateDepotInput.value && !dateDebutInput.value) {
                                        dateDebutInput.value = dateDepotInput.value;
                                    }
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ajouter certificate - modal -->
