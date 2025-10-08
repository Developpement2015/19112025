@include('components.head', ['titre' => 'Export des Congés'])

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('components.header')

        @include('components.sidebar')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="add-item d-flex">
                        <div class="page-title">
                            <h4>Export des Congés</h4>
                            <h6>Exporter la liste des congés selon les critères sélectionnés</h6>
                        </div>
                    </div>
                    <ul class="table-top-head">
                        <li>
                            <a href="{{ route('documents.search') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Retour à la recherche
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Export Form -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fa fa-download"></i> Paramètres d'export
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fonctionnaire.export-conges') }}" method="POST" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>Date début <span class="text-danger">*</span></label>
                                        <input type="date" name="date_debut" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>Date fin <span class="text-danger">*</span></label>
                                        <input type="date" name="date_fin" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>Type de congé</label>
                                        <select name="type_conge_id" class="form-control">
                                            <option value="">Tous les types</option>
                                            @foreach($typeConges as $typeConge)
                                                <option value="{{ $typeConge->id }}">{{ $typeConge->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <label>PPR du fonctionnaire</label>
                                        <input type="text" name="ppr" class="form-control" placeholder="Laisser vide pour tous">
                                        <small class="text-muted">Saisir le PPR pour un fonctionnaire spécifique</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Format d'export</label>
                                        <div class="form-check-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="format" id="formatPdf" value="pdf" checked>
                                                <label class="form-check-label" for="formatPdf">
                                                    <i class="fa fa-file-pdf-o text-danger"></i> PDF
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="format" id="formatExcel" value="excel">
                                                <label class="form-check-label" for="formatExcel">
                                                    <i class="fa fa-file-excel-o text-success"></i> Excel
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-download"></i> Exporter
                                        </button>
                                        <button type="reset" class="btn btn-secondary ml-2">
                                            <i class="fa fa-refresh"></i> Réinitialiser
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Information Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fa fa-info-circle"></i> Informations
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h6><i class="fa fa-lightbulb-o"></i> Instructions d'utilisation :</h6>
                            <ul class="mb-0">
                                <li>Sélectionnez une période en définissant les dates de début et de fin</li>
                                <li>Choisissez un type de congé spécifique ou laissez vide pour tous les types</li>
                                <li><strong>PPR :</strong> Saisissez le PPR d'un fonctionnaire pour un export individuel, ou laissez vide pour tous les fonctionnaires</li>
                                <li>Sélectionnez le format d'export souhaité (PDF ou Excel)</li>
                                <li>Cliquez sur "Exporter" pour télécharger le fichier</li>
                            </ul>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6><i class="fa fa-file-pdf-o text-danger"></i> Export PDF</h6>
                                    <p class="text-muted small">
                                        Format idéal pour l'impression et l'archivage.
                                        Contient un tableau détaillé avec toutes les informations.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6><i class="fa fa-file-excel-o text-success"></i> Export Excel</h6>
                                    <p class="text-muted small">
                                        Format idéal pour l'analyse et le traitement des données.
                                        Permet de faire des calculs et des filtres.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    @include('components.foot')

    <script>
        $(document).ready(function() {
            // Set default dates (current month)
            const today = new Date();
            const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
            const lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);

            $('input[name="date_debut"]').val(firstDay.toISOString().split('T')[0]);
            $('input[name="date_fin"]').val(lastDay.toISOString().split('T')[0]);

            // Form validation
            $('form').on('submit', function(e) {
                const dateDebut = new Date($('input[name="date_debut"]').val());
                const dateFin = new Date($('input[name="date_fin"]').val());

                if (dateDebut > dateFin) {
                    e.preventDefault();
                    alert('La date de début doit être antérieure à la date de fin.');
                    return false;
                }

                // Show loading message
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();
                submitBtn.html('<i class="fa fa-spinner fa-spin"></i> Export en cours...');
                submitBtn.prop('disabled', true);

                // Re-enable button after 3 seconds
                setTimeout(function() {
                    submitBtn.html(originalText);
                    submitBtn.prop('disabled', false);
                }, 3000);
            });
        });
    </script>

    <style>
        .form-check-group {
            display: flex;
            gap: 20px;
        }

        .form-check-inline {
            margin-right: 0;
        }

        .info-box {
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            background-color: #f8f9fa;
        }

        .info-box h6 {
            margin-bottom: 8px;
            font-weight: 600;
        }

        .alert-info {
            border-left: 4px solid #17a2b8;
        }
    </style>
</body>
</html>
