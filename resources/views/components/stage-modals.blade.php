<!-- Modales pour la gestion des entités liées -->

<!-- Modal Gestion des Écoles -->
<div class="modal fade" id="manageEcolesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Écoles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout -->
                <form id="ecoleForm" class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="ecole_nom" placeholder="Nom en français" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="ecole_nom_arabe" placeholder="الإسم بالعربية" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" id="cancelEditEcole" class="btn btn-secondary d-none">Annuler</button>
                    </div>
                </form>

                <!-- Liste des écoles -->
                <div class="table-responsive">
                    <table class="table table-sm" id="ecolesTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Nom Arabe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gestion des Options -->
<div class="modal fade" id="manageOptionsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Options/Spécialités</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout -->
                <form id="optionForm" class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="option_nom" placeholder="Nom en français" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="option_nom_arabe" placeholder="الإسم بالعربية" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" id="cancelEditOption" class="btn btn-secondary d-none">Annuler</button>
                    </div>
                </form>

                <!-- Liste des options -->
                <div class="table-responsive">
                    <table class="table table-sm" id="optionsTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Nom Arabe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gestion des Encadrants -->
<div class="modal fade" id="manageEncadrantsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Encadrants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout -->
                <form id="encadrantForm" class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="encadrant_nom" placeholder="Nom en français" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="encadrant_nom_arabe" placeholder="الإسم بالعربية" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="text" id="encadrant_fonction" placeholder="Fonction en français" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="text" id="encadrant_fonction_arabe" placeholder="الوظيفة بالعربية" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" id="cancelEditEncadrant" class="btn btn-secondary d-none">Annuler</button>
                    </div>
                </form>

                <!-- Liste des encadrants -->
                <div class="table-responsive">
                    <table class="table table-sm" id="encadrantsTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Nom Arabe</th>
                                <th>Fonction</th>
                                <th>Fonction Arabe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gestion des Services -->
<div class="modal fade" id="manageServicesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    La gestion des services se fait via le menu "Paramètres > Services".
                    <br>
                    <a href="{{ route('services.page') }}" target="_blank" class="btn btn-sm btn-primary mt-2">
                        <i class="fas fa-external-link-alt me-1"></i> Ouvrir la gestion des services
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gestion des Formations Sanitaires -->
<div class="modal fade" id="manageFormationsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Formations Sanitaires</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    La gestion des formations sanitaires se fait via le menu "Paramètres > Formations Sanitaires".
                    <br>
                    <a href="{{ route('nom-formation-sanitaire.page') }}" target="_blank" class="btn btn-sm btn-primary mt-2">
                        <i class="fas fa-external-link-alt me-1"></i> Ouvrir la gestion des formations sanitaires
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gestion des Types de Stage -->
<div class="modal fade" id="manageTypeStagesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gestion des Types de Stage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout -->
                <form id="typeStageForm" class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="type_stage_nom" placeholder="Nom en français" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="type_stage_nom_arabe" placeholder="الإسم بالعربية" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" id="cancelEditTypeStage" class="btn btn-secondary d-none">Annuler</button>
                    </div>
                </form>

                <!-- Liste des types de stage -->
                <div class="table-responsive">
                    <table class="table table-sm" id="typeStagesTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Nom Arabe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données seront chargées via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/stage-modals.js"></script>
