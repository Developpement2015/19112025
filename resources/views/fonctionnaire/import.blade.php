<x-head titre="Import des Fonctionnaires" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Import des Fonctionnaires</h4>
                    <h6>Importer les données depuis un fichier Excel</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a href="{{ route('fonctionnaire.page') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Retour
                    </a>
                </li>
            </ul>
        </div>

            <!-- Messages de succès/erreur -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('errors') && count(session('errors')) > 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Erreurs détectées :</h6>
                    <ul class="mb-0">
                        @foreach(session('errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <!-- Instructions -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>Instructions</h5>
                        </div>
                        <div class="card-body">
                            <h6>Format du fichier Excel :</h6>
                            <p>Votre fichier Excel doit contenir les colonnes suivantes dans cet ordre :</p>
                            <ol>
                                <li><strong>PPR</strong> (obligatoire) - Numéro PPR du fonctionnaire</li>
                                <li><strong>Nom</strong> (obligatoire) - Nom de famille</li>
                                <li><strong>Prénom</strong> (obligatoire) - Prénom</li>
                                <li><strong>CIN</strong> (optionnel) - Numéro de carte d'identité</li>
                                <li><strong>Sexe</strong> (optionnel) - M/F, Masculin/Féminin, Homme/Femme</li>
                                <li><strong>Date de naissance</strong> (optionnel) - Format: JJ/MM/AAAA</li>
                            </ol>

                            <div class="alert alert-info">
                                <h6><i class="fas fa-lightbulb me-2"></i>Conseils :</h6>
                                <ul class="mb-0">
                                    <li>La première ligne peut contenir les en-têtes (sera ignorée)</li>
                                    <li>Les doublons (même PPR) seront ignorés</li>
                                    <li>Formats acceptés : .xlsx, .xls, .csv</li>
                                    <li>Taille maximum : 10 MB</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire d'import -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-upload me-2"></i>Importer le fichier</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fonctionnaire.import.process') }}" method="POST" enctype="multipart/form-data" id="importForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="excel_file" class="form-label">Fichier Excel <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="excel_file" name="excel_file"
                                           accept=".xlsx,.xls,.csv" required>
                                    <div class="form-text">Sélectionnez votre fichier Excel contenant les données des fonctionnaires</div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirm_import" required>
                                        <label class="form-check-label" for="confirm_import">
                                            Je confirme que le fichier respecte le format requis
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="fas fa-upload me-2"></i>Importer les données
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Exemple de fichier -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="card-title"><i class="fas fa-table me-2"></i>Exemple de structure</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>PPR</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>CIN</th>
                                            <th>Sexe</th>
                                            <th>Date de naissance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>123456</td>
                                            <td>BENALI</td>
                                            <td>Ahmed</td>
                                            <td>AB123456</td>
                                            <td>M</td>
                                            <td>15/03/1985</td>
                                        </tr>
                                        <tr>
                                            <td>789012</td>
                                            <td>ALAMI</td>
                                            <td>Fatima</td>
                                            <td>CD789012</td>
                                            <td>F</td>
                                            <td>22/07/1990</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('importForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Import en cours...';
});

// Validation du fichier
document.getElementById('excel_file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileSize = file.size / 1024 / 1024; // Convert to MB
        if (fileSize > 10) {
            alert('Le fichier est trop volumineux. Taille maximum : 10 MB');
            e.target.value = '';
            return;
        }

        const allowedTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                             'application/vnd.ms-excel', 'text/csv'];
        if (!allowedTypes.includes(file.type)) {
            alert('Format de fichier non supporté. Utilisez .xlsx, .xls ou .csv');
            e.target.value = '';
            return;
        }
    }
});
</script>

<x-foot />
