<x-head titre="Gestion des Stages" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Gestion des Demandes de Stage</h4>
                    <h6 class="text-capitalize text-muted">Gestion des Stages</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a href="{{ route('stages.pdf') }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimer en PDF">
                        <img src="/html/assets/img/icons/pdf.svg" alt="img">
                    </a>
                </li>
                <li>
                    <a href="{{ route('stages.export') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Exporter Fichier Excel">
                        <img src="/html/assets/img/icons/excel.svg" alt="img">
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Réduit" id="collapse-header">
                        <i data-feather="chevron-up" class="feather-chevron-up"></i>
                    </a>
                </li>
            </ul>
            <div class="page-btn">
                <a href="{{ route('stages.create') }}" class="btn btn-added">
                    <i data-feather="plus-circle" class="me-2"></i> Ajouter un Stage
                </a>
            </div>
        </div>

        <!-- /product list -->
        <div class="card table-list-card">
            <div class="card-body">
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nom & Prénom</th>
                                <th>CIN</th>
                                <th>École</th>
                                <th>Option</th>
                                <th>Formation Sanitaire</th>
                                <th>Service</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Durée (jours)</th>
                                <th>Statut</th>
                                <th>Cadre</th>
                                <th>Type</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
<!-- Block Principal -->

{{-- DataTable Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // DataTable for #table
        var table = new DataTable('#table', {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('stages.data') }}",
            },
            columns: [
                { data: 'nom_prenom' },
                { data: 'cin' },
                {
                    data: 'ecole.nom',
                    render: function (data, type, row) {
                        return '<span class="badge badge-md bg-info">' + data + '</span>';
                    }
                },
                {
                    data: 'option.nom',
                    render: function (data, type, row) {
                        return '<span class="badge badge-md bg-primary">' + data + '</span>';
                    }
                },
                {
                    data: 'formation_sanitaire.nom',
                    render: function (data, type, row) {
                        return '<span class="badge badge-md bg-success">' + data + '</span>';
                    }
                },
                {
                    data: 'service.nom',
                    render: function (data, type, row) {
                        return '<span class="badge badge-md bg-warning">' + data + '</span>';
                    }
                },
                { data: 'date_debut' },
                { data: 'date_fin' },
                { data: 'duree' },
                {
                    data: 'statut_attestation',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'cadre',
                    render: function (data, type, row) {
                        const badgeClass = data === 'médical' ? 'bg-success' : 'bg-info';
                        return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                    }
                },
                {
                    data: 'type_stage',
                    render: function (data, type, row) {
                        const badgeClass = data === 'formation' ? 'bg-primary' : 'bg-secondary';
                        return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                    }
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            order: [[0, 'desc']],
            orderCellsTop: true,
            language: {
                url: "/html/assets/js/data-French.json"
            }
        });
    });

    // Fonction pour ouvrir le modal de note de stage
    function openNoteStageModal(stageId) {
        // Charger les données du stage
        fetch(`/api/stages/${stageId}`)
            .then(response => response.json())
            .then(stage => {
                document.getElementById('noteStageId').value = stageId;
                document.getElementById('stagiaireNom').textContent = stage.nom_prenom;
                document.getElementById('stagiaireDetails').textContent = `CIN: ${stage.cin} | École: ${stage.ecole?.nom || ''} | Option: ${stage.option?.nom || ''}`;

                // Charger le contenu de la note par défaut
                loadDefaultNoteContent(stage);

                // Ouvrir le modal
                const modal = new bootstrap.Modal(document.getElementById('noteStageModal'));
                modal.show();
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors du chargement des données du stage');
            });
    }

    // Fonction pour charger le contenu par défaut de la note
    function loadDefaultNoteContent(stage) {
        // Template par défaut (sera remplacé par votre format)
        const defaultContent = `
ROYAUME DU MAROC
MINISTÈRE DE LA SANTÉ ET DE LA PROTECTION SOCIALE
DÉLÉGATION PROVINCIALE DE FÈS

NOTE DE SERVICE N° ___/2025

OBJET: Stage de ${stage.nom_prenom}

Monsieur/Madame ${stage.nom_prenom},
CIN: ${stage.cin}
École: ${stage.ecole?.nom || ''}
Option: ${stage.option?.nom || ''}
Formation Sanitaire: ${stage.formation_sanitaire?.nom || ''}
Service: ${stage.service?.nom || ''}

Période de stage: du ${stage.date_debut} au ${stage.date_fin}
Durée: ${stage.duree} jours

[Contenu de la note à personnaliser...]

Fait à Fès, le ___________

Le Délégué Provincial
        `;

        document.getElementById('noteContent').value = defaultContent.trim();
    }

    // Fonction pour générer le PDF de la note
    function generateNotePDF() {
        const stageId = document.getElementById('noteStageId').value;
        const content = document.getElementById('noteContent').value;

        // Créer un formulaire pour envoyer les données
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/stages/note-pdf';
        form.target = '_blank';
        form.style.display = 'none';

        // Ajouter le token CSRF
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        // Ajouter l'ID du stage
        const stageInput = document.createElement('input');
        stageInput.type = 'hidden';
        stageInput.name = 'stage_id';
        stageInput.value = stageId;
        form.appendChild(stageInput);

        // Ajouter le contenu
        const contentInput = document.createElement('input');
        contentInput.type = 'hidden';
        contentInput.name = 'content';
        contentInput.value = content;
        form.appendChild(contentInput);

        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }
</script>

<!-- Modal Note de Stage -->
<div class="modal fade" id="noteStageModal" tabindex="-1" aria-labelledby="noteStageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteStageModalLabel">
                    <i class="fas fa-file-alt"></i> Note de Stage
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="noteStageId">

                <!-- Informations du stagiaire -->
                <div class="alert alert-info">
                    <h6 class="mb-1">Stagiaire: <span id="stagiaireNom"></span></h6>
                    <small id="stagiaireDetails"></small>
                </div>

                <!-- Éditeur de contenu -->
                <div class="mb-3">
                    <label for="noteContent" class="form-label">Contenu de la note :</label>
                    <textarea id="noteContent" class="form-control" rows="20" style="font-family: 'Courier New', monospace;"></textarea>
                </div>

                <!-- Instructions -->
                <div class="alert alert-warning">
                    <small>
                        <strong>Instructions :</strong> Modifiez le contenu de la note selon vos besoins.
                        Les données du stagiaire sont automatiquement insérées.
                        Vous pouvez personnaliser le texte avant de générer le PDF.
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="generateNotePDF()">
                    <i class="fas fa-file-pdf"></i> Générer PDF
                </button>
            </div>
        </div>
    </div>
</div>

<x-foot />
