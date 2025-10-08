<div>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Relicats</h2>
        <div>
            <div class="d-flex align-items-center">
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
                {{-- <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addrelicat">
                    <i data-feather="plus-circle" class="me-2"></i>Ajouter
                </a> --}}
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="statistiques-tab" data-bs-toggle="tab" data-bs-target="#statistiques" type="button" role="tab">
                            <i class="fas fa-chart-bar me-1"></i> Statistiques
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
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ampliationsModal{{ $conge['id'] }}">
                                                <i class="fas fa-file-pdf me-1"></i> PDF
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
                        </tbody>
                    </table>
                        </div>
                        <!-- Inline: Congés pris (sous le tableau Reliquats) -->
                        @php
                            $taken = collect($congeDocuments ?? [])->filter(function($c){
                                return isset($c['source']) && $c['source'] === 'decision' && isset($c['statut']) && in_array(mb_strtolower($c['statut']), ['approuvé','approuve','pris','approuvé']);
                            })->values();
                        @endphp

                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="fas fa-plane-departure me-2"></i> Congés pris</h6>
                            </div>
                            <div class="card-body p-2">
                                @if($taken->isEmpty())
                                    <p class="text-muted mb-0">Aucun congé pris enregistré.</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-sm mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Jours</th>
                                                    <th>Date début</th>
                                                    <th>Date fin</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($taken as $t)
                                                    <tr>
                                                        <td>{{ $t['type_conge'] ?? '-' }}</td>
                                                        <td>{{ $t['nombre_jours'] ?? '-' }}</td>
                                                        <td>{{ $t['date_debut'] ? \Carbon\Carbon::parse($t['date_debut'])->format('d/m/Y') : '-' }}</td>
                                                        <td>{{ $t['date_fin'] ? \Carbon\Carbon::parse($t['date_fin'])->format('d/m/Y') : '-' }}</td>
                                                        <td><span class="badge bg-success">{{ $t['statut'] }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Statistiques tab -->
                    <div class="tab-pane fade" id="statistiques" role="tabpanel">
                        @if(isset($congeStatistics))
                            <!-- Résumé général -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Résumé général</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-md-4">
                                                    <div class="stat-box">
                                                        <h4 class="text-primary">{{ $congeStatistics['summary']['total_reliquats'] ?? 0 }}</h4>
                                                        <p class="text-muted mb-0">Solde annuel total</p>
                                                        <small class="text-muted">Allocation standard</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="stat-box">
                                                        <h4 class="text-danger">{{ $congeStatistics['summary']['total_pris'] ?? 0 }}</h4>
                                                        <p class="text-muted mb-0">Jours pris (total)</p>
                                                        <small class="text-muted">Toutes années confondues</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="stat-box">
                                                        <h4 class="text-{{ ($congeStatistics['summary']['total_restant'] ?? 0) >= 0 ? 'success' : 'warning' }}">
                                                            {{ $congeStatistics['summary']['total_restant'] ?? 0 }}
                                                        </h4>
                                                        <p class="text-muted mb-0">Solde global</p>
                                                        <small class="text-muted">
                                                            @if(($congeStatistics['summary']['total_restant'] ?? 0) < 0)
                                                                Dépassement
                                                            @else
                                                                Disponible
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Statistiques par année -->
                            @if(!empty($congeStatistics['by_year']))
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0"><i class="fas fa-calendar me-2"></i>Reliquats par année</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Année</th>
                                                                <th>Allocation standard</th>
                                                                <th>Jours pris</th>
                                                                <th>Solde restant</th>
                                                                <th>Détail par type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($congeStatistics['by_year'] as $yearData)
                                                                <tr>
                                                                    <td><strong>{{ $yearData['year'] }}</strong></td>
                                                                    <td>
                                                                        @php
                                                                            $totalStandard = 0;
                                                                            foreach($yearData['by_type'] as $typeData) {
                                                                                $totalStandard += $typeData['standard'];
                                                                            }
                                                                        @endphp
                                                                        <span class="badge bg-info">{{ $totalStandard }}</span>
                                                                    </td>
                                                                    <td><span class="badge bg-danger">{{ $yearData['jours_pris'] }}</span></td>
                                                                    <td>
                                                                        @php $solde = $totalStandard - $yearData['jours_pris']; @endphp
                                                                        <span class="badge bg-{{ $solde >= 0 ? 'success' : 'warning' }}">{{ $solde }}</span>
                                                                    </td>
                                                                    <td>
                                                                        @foreach($yearData['by_type'] as $typeName => $typeData)
                                                                            @if($typeData['pris'] > 0 || $typeData['standard'] > 0)
                                                                                <small class="d-block">
                                                                                    <strong>{{ $typeName }}:</strong>
                                                                                    {{ $typeData['standard'] }} - {{ $typeData['pris'] }} =
                                                                                    <span class="badge badge-sm bg-{{ $typeData['solde'] >= 0 ? 'success' : 'warning' }}">
                                                                                        {{ $typeData['solde'] }}
                                                                                    </span>
                                                                                </small>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Statistiques par type de congé -->
                            @if(!empty($congeStatistics['by_type']))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0"><i class="fas fa-tags me-2"></i>Statistiques par type de congé</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Type de congé</th>
                                                                <th>Solde annuel</th>
                                                                <th>Jours pris (total)</th>
                                                                <th>Jours restants</th>
                                                                <th>Taux d'utilisation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($congeStatistics['by_type'] as $typeName => $typeData)
                                                                @if($typeData['standard_allocation'] > 0)
                                                                <tr>
                                                                    <td><strong>{{ $typeName }}</strong></td>
                                                                    <td>
                                                                        <span class="badge bg-info">{{ $typeData['standard_allocation'] }}</span>
                                                                        <small class="text-muted d-block">jours/an</small>
                                                                    </td>
                                                                    <td><span class="badge bg-danger">{{ $typeData['pris_total'] }}</span></td>
                                                                    <td>
                                                                        <span class="badge bg-{{ $typeData['restant'] >= 0 ? 'success' : 'warning' }}">
                                                                            {{ $typeData['restant'] }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $taux = $typeData['standard_allocation'] > 0 ?
                                                                                round(($typeData['pris_total'] / $typeData['standard_allocation']) * 100, 1) : 0;
                                                                        @endphp
                                                                        <div class="progress" style="height: 20px;">
                                                                            <div class="progress-bar bg-{{ $taux > 80 ? 'danger' : ($taux > 50 ? 'warning' : 'success') }}"
                                                                                 style="width: {{ min($taux, 100) }}%">
                                                                                {{ $taux }}%
                                                                            </div>
                                                                        </div>
                                                                        <small class="text-muted">
                                                                            {{ $typeData['pris_total'] }}/{{ $typeData['standard_allocation'] }} jours
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-chart-bar fa-3x mb-3"></i>
                                <p>Aucune statistique disponible pour ce fonctionnaire.</p>
                            </div>
                        @endif
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


<table class="table">


    <thead>
        <tr>
            <th>Type Congé</th>
            <th>Nombre de Jours Disponibles</th>
            <th>Date de Prise</th>
            <th>Jours Restants</th>
            {{-- <th>Actions</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($fonctionnaire->relicats as $relicat)
        <tr>
            <td>
                {{ $relicat->typeConge->nom }}
                @if(isset($relicat->is_additif) && $relicat->is_additif)
                    <span class="badge bg-warning ms-2">Additif ({{ $relicat->annee ?? '?' }})</span>
                @endif
            </td>
            <td>{{ $relicat->nbr_jours_disponibles }}</td>
            <td>
                @if($relicat->date_conge)
                    {{ \Carbon\Carbon::parse($relicat->date_conge)->format('d/m/Y') }}
                @else
                    <span class="text-muted">Non spécifiée</span>
                @endif
            </td>
            <td>
                @php
                    $typeCongeId = $relicat->type_conge_id;

                    // Get the year from the relicat date or use the current year
                    $relicatYear = $relicat->date_conge
                        ? \Carbon\Carbon::parse($relicat->date_conge)->year
                        : date('Y');

                    // Get the current year for comparison
                    $currentYear = date('Y');

                    // Start from 2025 as requested
                    $startYear = 2025;
                    $endYear = max($currentYear, $relicatYear) + 1; // Include next year for planning

                    // Get all availabilities for this fonctionnaire and type of congé
                    $availabilities = \App\Models\CongeAvailability::where('fonctionnaire_id', $fonctionnaire->id)
                        ->where('type_conge_id', $typeCongeId)
                        ->where('year', '>=', $startYear)
                        ->where('year', '<=', $endYear)
                        ->orderBy('year')
                        ->get();

                    // If no availabilities exist yet, create them using the service
                    if ($availabilities->isEmpty()) {
                        $congeAvailabilityService = app(\App\Services\CongeAvailabilityService::class);
                        $congeAvailabilityService->updateAvailability($fonctionnaire->id, $typeCongeId, $currentYear);

                        // Fetch the availabilities again
                        $availabilities = \App\Models\CongeAvailability::where('fonctionnaire_id', $fonctionnaire->id)
                            ->where('type_conge_id', $typeCongeId)
                            ->where('year', '>=', $startYear)
                            ->where('year', '<=', $endYear)
                            ->orderBy('year')
                            ->get();
                    }

                    // Get the current year's availability
                    $currentYearAvailability = $availabilities->firstWhere('year', $currentYear);

                    // Get the total remaining days (from the last year's availability)
                    $lastYearAvailability = $availabilities->last();
                    $totalJoursRestants = $lastYearAvailability ? $lastYearAvailability->jours_restants : 0;
                @endphp

                <div>
                    <!-- Current year's remaining days -->
                    <span class="badge {{ $currentYearAvailability && $currentYearAvailability->jours_restants > 0 ? 'bg-success' : 'bg-danger' }}">
                        {{ $currentYearAvailability ? $currentYearAvailability->jours_restants : 0 }} jours en {{ $currentYear }}
                    </span>

                    <!-- Total remaining days -->
                    <span class="mt-1 badge bg-primary d-block">
                        Total: {{ $totalJoursRestants }} jours
                    </span>

                    <!-- Detailed breakdown button -->
                    <button type="button" class="mt-1 btn btn-sm btn-outline-info"
                            data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $relicat->id }}">
                        <i class="fas fa-info-circle"></i> Détails
                    </button>

                    <!-- Modal with detailed breakdown -->
                    <div class="modal fade" id="detailModal{{ $relicat->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Détail des jours de congé - {{ $relicat->typeConge->nom }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>Année</th>
                                                <th>Jours par an</th>
                                                <th>Report</th>
                                                <th>Disponibles</th>
                                                <th>Utilisés</th>
                                                <th>Restants</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($availabilities as $availability)
                                                <tr class="{{ $availability->year == $currentYear ? 'table-primary' : '' }}">
                                                    <td>{{ $availability->year }}</td>
                                                    <td>{{ $availability->jours_total }}</td>
                                                    <td>{{ $availability->jours_reportes }}</td>
                                                    <td>{{ $availability->jours_disponibles }}</td>
                                                    <td>{{ $availability->jours_utilises }}</td>
                                                    <td>{{ $availability->jours_restants }}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="table-dark">
                                                <td colspan="4"><strong>Total restant</strong></td>
                                                <td colspan="2"><strong>{{ $totalJoursRestants }} jours</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @if(!empty($relicat->document))
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $relicat->document) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fas fa-download me-1"></i> Télécharger la note
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            {{--
            <td>
                <a class="p-2 mb-0 me-0 btn btn-danger" href="javascript:void(0);"
                   onclick="confirmDelete({{ $relicat->id }}, '{{ route('reliquat.delete', $relicat->id) }}', 'êtes-vous sûr de vouloir supprimer ce reliquat?')">
                    <i class="text-white fas fa-trash-alt me-2"></i>
                    Supprimer
                </a>
            </td>
            --}}
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
