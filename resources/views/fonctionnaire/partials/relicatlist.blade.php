<div>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Relicats</h2>
        <div>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#listeCongesPrisesAdditifsModal">
                    <i class="fas fa-list-alt me-1"></i> Liste des congés pris & additifs par année
                </button>
<!-- Modal: Liste des congés pris et additifs par année -->
<div class="modal fade" id="listeCongesPrisesAdditifsModal" tabindex="-1" aria-labelledby="listeCongesPrisesAdditifsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listeCongesPrisesAdditifsLabel">Liste des congés pris et additifs par année</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Année</th>
                                <th>Type</th>
                                <th>Nombre de jours</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Statut</th>
                                <th>Source</th>
                                <th>Infos additif</th>
                                <th>Fichier</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $allConges = collect($congeDocuments ?? [])->sortBy(function($c) {
                                    return $c['date_debut'] ? \Carbon\Carbon::parse($c['date_debut'])->year : 0;
                                });
                                $groupedByYear = $allConges->groupBy(function($c) {
                                    return $c['date_debut'] ? \Carbon\Carbon::parse($c['date_debut'])->year : 'Non spécifiée';
                                });
                            @endphp
                            @foreach($groupedByYear as $year => $conges)
                                @foreach($conges as $conge)
                                    <tr>
                                        <td>{{ $year }}</td>
                                        <td>{{ $conge['type_conge'] }}</td>
                                        <td>{{ $conge['nombre_jours'] }}</td>
                                        <td>
                                            @if($conge['date_debut'])
                                                {{ \Carbon\Carbon::parse($conge['date_debut'])->format('d/m/Y') }}
                                            @else
                                                <span class="text-muted">Non spécifiée</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($conge['date_fin'])
                                                {{ \Carbon\Carbon::parse($conge['date_fin'])->format('d/m/Y') }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $conge['statut'] == 'Disponible' ? 'info' : ($conge['statut'] == 'Approuvé' ? 'success' : 'warning') }}">
                                                {{ $conge['statut'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $conge['source'] == 'relicat' ? 'primary' : 'secondary' }}">
                                                {{ $conge['source'] }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(isset($conge['relicat']->is_additif) && $conge['relicat']->is_additif)
                                                <span class="badge bg-success">Additif: {{ $conge['relicat']->nbr_jours_disponibles }} jours, année {{ $conge['relicat']->annee }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($conge['relicat']->document) && $conge['relicat']->document)
                                                <a href="{{ asset('storage/' . $conge['relicat']->document) }}" target="_blank" class="btn btn-sm btn-outline-primary">Fichier</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($conge['source'] == 'relicat')
                                                <form method="POST" action="{{ route('reliquat.delete', $conge['relicat']->id) }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce reliquat ?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#listCongesModal">
                    <i class="fas fa-list me-1"></i> Liste des congés
                    @if(isset($congeDocuments) && count($congeDocuments) > 0)
                        <span class="badge bg-success ms-1">{{ count($congeDocuments) }}</span>
                    @else
                        <span class="badge bg-secondary ms-1">0</span>
                    @endif
                </button>
                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exportCongesModal">
                    <i class="fas fa-file-excel me-1"></i> Exporter Excel
                </button>
                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addrelicat">
                    <i data-feather="plus-circle" class="me-2"></i>Ajouter additif congé
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for List Congés -->
<div class="modal fade" id="listCongesModal" tabindex="-1" aria-labelledby="listCongesModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listCongesModalLabel">Tous les congés de {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Navigation tabs -->
                <ul class="nav nav-tabs" id="congesTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="liste-tab" data-bs-toggle="tab" data-bs-target="#liste" type="button" role="tab">
                            <i class="fas fa-list me-1"></i> Liste des congés
                        </button>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content mt-3" id="congesTabContent">
                    <!-- Liste des congés tab -->
                    <div class="tab-pane fade show active" id="liste" role="tabpanel">
                        <!-- Totaux par type de congé -->
                        @if(isset($congeTotals) && !empty($congeTotals))
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fas fa-calculator me-2"></i>Totaux par type de congé</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($congeTotals as $typeName => $typeData)
                                                    @php
                                                        // Normalize sexe: accept 'M'/'F' or words
                                                        $sexeChar = isset($fonctionnaire->sexe) ? strtoupper(substr($fonctionnaire->sexe,0,1)) : null;
                                                        $isFemale = $sexeChar === 'F' || in_array(strtolower($fonctionnaire->sexe ?? ''), ['feminine','femme','female','f']);
                                                        $isMale = $sexeChar === 'M' || in_array(strtolower($fonctionnaire->sexe ?? ''), ['masculin','homme','male','m']);
                                                    @endphp
                                                    {{-- Hide gender-specific leave types: paternity for females, maternity for males --}}
                                                    @if(($isFemale && stripos($typeName, 'patern') !== false) || ($isMale && stripos($typeName, 'matern') !== false))
                                                        @continue
                                                    @endif
                                                    <div class="col-md-4 mb-3">
                                                        <div class="type-summary-card">
                                                            <h6 class="type-name">{{ $typeName }}</h6>
                                                            <div class="type-stats">
                                                                <div class="stat-item">
                                                                    <span class="stat-label">Solde standard:</span>
                                                                    <span class="badge bg-info">{{ $typeData['standard_allocation'] }}</span>
                                                                </div>
                                                                <div class="stat-item">
                                                                    <span class="stat-label">Disponible:</span>
                                                                    <span class="badge bg-primary">{{ $typeData['available_days'] }}</span>
                                                                </div>
                                                                <div class="stat-item">
                                                                    <span class="stat-label">Pris:</span>
                                                                    <span class="badge bg-danger">{{ $typeData['jours_pris_total'] }}</span>
                                                                </div>
                                                                <div class="stat-item">
                                                                    <span class="stat-label">Restants:</span>
                                                                    <span class="badge bg-{{ $typeData['jours_restants'] >= 0 ? 'success' : 'warning' }}">
                                                                        {{ $typeData['jours_restants'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="progress mt-2" style="height: 8px;">
                                                                    <div class="progress-bar bg-{{ $typeData['pourcentage_utilise'] > 80 ? 'danger' : ($typeData['pourcentage_utilise'] > 50 ? 'warning' : 'success') }}"
                                                                         style="width: {{ min($typeData['pourcentage_utilise'], 100) }}%">
                                                                    </div>
                                                                </div>
                                                                <small class="text-muted">{{ $typeData['pourcentage_utilise'] }}% utilisé</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Type de congé</th>
                                <th>Nombre de jours</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($congeDocuments ?? [] as $conge)
                                <tr>
                                    <td>
                                        <span class="badge bg-{{ $conge['source'] == 'relicat' ? 'primary' : 'success' }}">
                                            {{ $conge['type'] }}
                                        </span>
                                    </td>
                                    <td>{{ $conge['type_conge'] }}</td>
                                    <td>{{ $conge['nombre_jours'] }}</td>
                                    <td>
                                        @if($conge['date_debut'])
                                            {{ \Carbon\Carbon::parse($conge['date_debut'])->format('d/m/Y') }}
                                        @else
                                            <span class="text-muted">Non spécifiée</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($conge['date_fin'])
                                            {{ \Carbon\Carbon::parse($conge['date_fin'])->format('d/m/Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $conge['statut'] == 'Disponible' ? 'info' : ($conge['statut'] == 'Approuvé' ? 'success' : 'warning') }}">
                                            {{ $conge['statut'] }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($conge['source'] == 'relicat')
                                            <button type="button" class="btn btn-sm btn-warning" onclick="showCongeDecisionDetails({{ $conge['id'] }})">
                                                <i class="fas fa-info-circle me-1"></i> Détail
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-success" onclick="showCongeDecisionDetails({{ $conge['id'] }})">
                                                <i class="fas fa-eye me-1"></i> Voir
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Aucun congé trouvé pour ce fonctionnaire.
                                        <br>
                                        <small class="mt-2 d-block">Les congés apparaîtront ici une fois créés dans le système.</small>
                                    </td>
                                </tr>
                            @endforelse

                            {{-- Modals for reliquat details --}}
                            @foreach($congeDocuments ?? [] as $conge)
                                @if($conge['source'] == 'relicat')
                                    <div class="modal fade" id="relicatDetailsModal{{ $conge['id'] }}" tabindex="-1" aria-labelledby="relicatDetailsLabel{{ $conge['id'] }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="relicatDetailsLabel{{ $conge['id'] }}">Détail du reliquat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><strong>Type de congé :</strong> {{ $conge['type_conge'] }}</li>
                                                        <li class="list-group-item"><strong>Nombre de jours :</strong> {{ $conge['nombre_jours'] }}</li>
                                                        <li class="list-group-item"><strong>Date début :</strong> {{ $conge['date_debut'] ? \Carbon\Carbon::parse($conge['date_debut'])->format('d/m/Y') : 'Non spécifiée' }}</li>
                                                        <li class="list-group-item"><strong>Date fin :</strong> {{ $conge['date_fin'] ? \Carbon\Carbon::parse($conge['date_fin'])->format('d/m/Y') : '-' }}</li>
                                                        <li class="list-group-item"><strong>Statut :</strong> {{ $conge['statut'] }}</li>
                                                        {{-- Show relicat-specific fields: date_depot, solde, année --}}
                                                        @if(isset($conge['relicat']))
                                                            <li class="list-group-item"><strong>Date de dépôt :</strong> {{ isset($conge['relicat']->date_depot) && $conge['relicat']->date_depot ? \Carbon\Carbon::parse($conge['relicat']->date_depot)->format('d/m/Y') : 'Non spécifiée' }}</li>
                                                            <li class="list-group-item"><strong>Nombre solde crédit (jours) :</strong> {{ $conge['relicat']->nbr_jours_disponibles ?? '-' }}</li>
                                                            <li class="list-group-item"><strong>Année :</strong> {{ $conge['relicat']->annee ?? '-' }}</li>
                                                            <li class="list-group-item"><strong>Additif :</strong> {{ isset($conge['relicat']->is_additif) && $conge['relicat']->is_additif ? 'Oui' : 'Non' }}</li>
                                                        @endif
                                                        @if(isset($conge['relicat']->document) && $conge['relicat']->document)
                                                            <li class="list-group-item"><strong>Document :</strong> <a href="{{ asset('storage/' . $conge['relicat']->document) }}" target="_blank">Télécharger</a></li>
                                                        @endif
                                                        {{-- legacy additif info was handled above --}}
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Congé Decision Details -->
<div class="modal fade" id="congeDecisionModal" tabindex="-1" aria-labelledby="congeDecisionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="congeDecisionModalLabel">Détails de la décision de congé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="congeDecisionContent">
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Ampliations Modals -->
@foreach($congeDocuments ?? [] as $conge)
    @if($conge['source'] == 'relicat')
        @php $relicat = $conge['relicat']; @endphp
    <div class="modal fade" id="ampliationsModal{{ $relicat->id }}" tabindex="-1" aria-labelledby="ampliationsModalLabel{{ $relicat->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ampliationsModalLabel{{ $relicat->id }}">Sélectionner les ampliations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('fonctionnaire.conge-decision', $relicat->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Veuillez sélectionner les ampliations à inclure dans le document :</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ampliations[]" value="M. Medecin Chef du SRES de Fes" id="ampliation1{{ $relicat->id }}">
                            <label class="form-check-label" for="ampliation1{{ $relicat->id }}">
                                M. Medecin Chef du SRES de Fes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ampliations[]" value="M. directeur CHR alghassani Fes" id="ampliation2{{ $relicat->id }}">
                            <label class="form-check-label" for="ampliation2{{ $relicat->id }}">
                                M. directeur CHR alghassani Fes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn khatib" id="ampliation3{{ $relicat->id }}">
                            <label class="form-check-label" for="ampliation3{{ $relicat->id }}">
                                M. directeur Hopital ibn khatib
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn baytar" id="ampliation4{{ $relicat->id }}">
                            <label class="form-check-label" for="ampliation4{{ $relicat->id }}">
                                M. directeur Hopital ibn baytar
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Générer PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endforeach

<!-- Modal for Export Congés -->
<div class="modal fade" id="exportCongesModal" tabindex="-1" aria-labelledby="exportCongesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportCongesModalLabel">Exporter les congés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('fonctionnaire.export-conges') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date début</label>
                                <input type="date" value="{{date('Y-m-d',-100)}}" class="form-control" id="date_debut" name="date_debut">                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date fin</label>
                                <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="date_fin" name="date_fin">                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type_conge_id" class="form-label">Type de congé</label>
                                <select class="form-select" id="type_conge_id" name="type_conge_id">
                                    <option value="">Tous les types</option>
                                    @foreach (\App\Models\TypeConge::all() as $typeConge)
                                        <option value="{{ $typeConge->id }}">{{ $typeConge->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formation_sanitaire_id" class="form-label">Formation sanitaire</label>
                                <select class="form-select" id="formation_sanitaire_id" name="formation_sanitaire_id">
                                    <option value="">Toutes les formations</option>
                                    @foreach (\App\Models\NomFormationSanitaire::all() as $formation)
                                        <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ppr" class="form-label">PPR</label>
                                <input type="text" class="form-control" id="ppr" name="ppr" placeholder="Rechercher par PPR">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-file-excel me-1"></i> Exporter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Nouveau tableau : jours restants de congé pour chaque type de congé -->
<h5 class="mt-4">Jours restants par type de congé</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Type de congé</th>
            <th>Jours restants</th>
        </tr>
    </thead>
    <tbody>
        @foreach($congeTotals ?? [] as $typeName => $typeData)
            <tr>
                <td>{{ $typeName }}</td>
                <td>
                    <span class="badge bg-{{ $typeData['jours_restants'] >= 0 ? 'success' : 'danger' }}">
                        {{ $typeData['jours_restants'] }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yearFilter = document.getElementById('year-filter');
        const relicatRows = document.querySelectorAll('tbody tr');

        // Function to filter relicats by year
        function filterRelicatsByYear() {
            const selectedYear = yearFilter.value;

            relicatRows.forEach(row => {
                const dateCell = row.querySelector('td:nth-child(3)');
                const dateText = dateCell.textContent.trim();

                // If date is not specified, always show the row
                if (dateText.includes('Non spécifiée')) {
                    row.style.display = '';
                    return;
                }

                // Extract year from date (format: dd/mm/yyyy)
                const dateParts = dateText.split('/');
                if (dateParts.length === 3) {
                    const year = dateParts[2];

                    // Show/hide row based on year match
                    if (year === selectedYear) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });

            // Update the availability badges for the selected year
            updateAvailabilityBadges(selectedYear);
        }

        // Function to update availability badges based on the selected year
        function updateAvailabilityBadges(selectedYear) {
            // For each relicat row that's visible
            relicatRows.forEach(row => {
                if (row.style.display !== 'none') {
                    // Find the detail button and extract the modal ID
                    const detailButton = row.querySelector('button[data-bs-target]');
                    if (!detailButton) return;

                    const modalId = detailButton.getAttribute('data-bs-target').replace('#', '');
                    const modal = document.getElementById(modalId);
                    if (!modal) return;

                    // Find the availability rows in the modal
                    const availabilityRows = modal.querySelectorAll('tbody tr:not(.table-dark)');

                    // Find the row for the selected year
                    let selectedYearRow = null;
                    availabilityRows.forEach(availRow => {
                        const yearCell = availRow.querySelector('td:nth-child(1)');
                        if (yearCell && yearCell.textContent.trim() === selectedYear) {
                            selectedYearRow = availRow;
                        }
                    });

                    if (selectedYearRow) {
                        // Get the remaining days for the selected year
                        const restantsCell = selectedYearRow.querySelector('td:nth-child(6)');
                        const joursRestants = parseInt(restantsCell.textContent.trim());

                        // Update the badge in the main table
                        const badgeContainer = row.querySelector('td:nth-child(4)');
                        if (badgeContainer) {
                            const yearBadge = badgeContainer.querySelector('.badge:first-child');
                            if (yearBadge) {
                                yearBadge.textContent = joursRestants + ' jours en ' + selectedYear;
                                yearBadge.className = 'badge ' + (joursRestants > 0 ? 'bg-success' : 'bg-danger');
                            }
                        }
                    }
                }
            });
        }

        // Add event listener to year filter
        yearFilter.addEventListener('change', filterRelicatsByYear);

        // Initial filter
        filterRelicatsByYear();
    });

    // Function to show congé decision details
    function showCongeDecisionDetails(decisionId) {
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('congeDecisionModal'));
        modal.show();

        // Reset content
        document.getElementById('congeDecisionContent').innerHTML = `
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
            </div>
        `;

        // Fetch decision details
        fetch(`/fonctionnaire/conge-decision-details/${decisionId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const decision = data.decision;
                    document.getElementById('congeDecisionContent').innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Fonctionnaire :</label>
                                    <div class="info-value">${decision.fonctionnaire}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">PPR :</label>
                                    <div class="info-value">${decision.ppr}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Type de congé :</label>
                                    <div class="info-value">${decision.type_conge}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Nombre de jours :</label>
                                    <div class="info-value"><span class="badge bg-primary">${decision.nombre_jours}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Date début :</label>
                                    <div class="info-value">${decision.date_debut || 'Non spécifiée'}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Date fin :</label>
                                    <div class="info-value">${decision.date_fin || 'Non spécifiée'}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Statut :</label>
                                    <div class="info-value">
                                        <span class="badge bg-${decision.statut === 'Approuvé' ? 'success' : (decision.statut === 'Rejeté' ? 'danger' : 'warning')}">
                                            ${decision.statut}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group">
                                    <label class="info-label">Créé le :</label>
                                    <div class="info-value">${decision.created_at}</div>
                                </div>
                            </div>
                        </div>
                        ${decision.remarques ? `
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info-group">
                                        <label class="info-label">Remarques :</label>
                                        <div class="info-value">${decision.remarques}</div>
                                    </div>
                                </div>
                            </div>
                        ` : ''}
                    `;
                } else {
                    document.getElementById('congeDecisionContent').innerHTML = `
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Erreur lors du chargement des détails de la décision.
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('congeDecisionContent').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Erreur lors du chargement des détails de la décision.
                    </div>
                `;
            });
    }
</script>

<style>
    .stat-box {
        padding: 15px;
        border-radius: 8px;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
    }

    .stat-box h4 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .nav-tabs .nav-link {
        border-radius: 8px 8px 0 0;
    }

    .nav-tabs .nav-link.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        border-radius: 10px 10px 0 0;
    }

    .progress {
        border-radius: 10px;
    }

    .badge {
        font-size: 0.9em;
        padding: 6px 10px;
    }

    .badge-sm {
        font-size: 0.75em;
        padding: 3px 6px;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        border-top: none;
    }

    .type-summary-card {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        height: 100%;
    }

    .type-name {
        color: #495057;
        font-weight: 600;
        margin-bottom: 10px;
        text-transform: capitalize;
    }

    .type-stats .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.9em;
        color: #6c757d;
    }

    .info-group {
        margin-bottom: 15px;
    }

    .info-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 5px;
        display: block;
    }

    .info-value {
        color: #212529;
        padding: 8px 12px;
        background-color: #f8f9fa;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }
</style>
