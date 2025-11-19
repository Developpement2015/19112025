<x-head titre="Gestion des demandes" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Gestion des demandes</h4>
                    <h6 class="text-capitalize text-muted">
                        @if($userLevel)
                            <span class="badge bg-primary">Niveau {{ $userLevel }}</span> - Demandes en attente de votre approbation
                        @else
                            Liste de toutes les demandes
                        @endif
                    </h6>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filtres de recherche -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('demandes.index') }}" class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ request('nom') }}" placeholder="Nom">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ request('prenom') }}" placeholder="Prénom">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">CIN</label>
                        <input type="text" name="cin" class="form-control" value="{{ request('cin') }}" placeholder="CIN">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">PPR</label>
                        <input type="text" name="ppr" class="form-control" value="{{ request('ppr') }}" placeholder="PPR">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="">Tous</option>
                            <option value="conge" {{ request('type') === 'conge' ? 'selected' : '' }}>Congé</option>
                            <option value="attestation" {{ request('type') === 'attestation' ? 'selected' : '' }}>Attestation</option>
                            <option value="autre" {{ request('type') === 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Statut</label>
                        <select name="status" class="form-select">
                            <option value="">Tous</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approuvé</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejeté</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Rechercher
                        </button>
                        <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Réinitialiser
                        </a>

                        <!-- Affichage des filtres actifs -->
                        @php
                            $activeFilters = [];
                            if(request('nom')) $activeFilters[] = 'Nom: ' . request('nom');
                            if(request('prenom')) $activeFilters[] = 'Prénom: ' . request('prenom');
                            if(request('cin')) $activeFilters[] = 'CIN: ' . request('cin');
                            if(request('ppr')) $activeFilters[] = 'PPR: ' . request('ppr');
                            if(request('type')) $activeFilters[] = 'Type: ' . ucfirst(request('type'));
                            if(request('status')) {
                                $statusLabels = ['pending' => 'En attente', 'approved' => 'Approuvé', 'rejected' => 'Rejeté'];
                                $activeFilters[] = 'Statut: ' . ($statusLabels[request('status')] ?? request('status'));
                            }
                        @endphp

                        @if(count($activeFilters) > 0)
                            <div class="mt-3 p-3 bg-light border rounded">
                                <strong><i class="fas fa-filter"></i> Filtres appliqués:</strong>
                                <div class="mt-2">
                                    @foreach($activeFilters as $filter)
                                        <span class="badge bg-info me-2 mb-1">{{ $filter }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card table-list-card">
            <div class="card-body">
                <!-- Compteur de résultats -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="mb-0">
                            <i class="fas fa-list"></i>
                            <strong>{{ $demandes->total() }}</strong> demande(s) trouvée(s)
                            @if($demandes->currentPage() > 1)
                                <small class="text-muted">(Page {{ $demandes->currentPage() }} sur {{ $demandes->lastPage() }})</small>
                            @endif
                        </h6>
                    </div>
                    <div>
                        <small class="text-muted">
                            Affichage de {{ $demandes->firstItem() ?? 0 }} à {{ $demandes->lastItem() ?? 0 }} sur {{ $demandes->total() }}
                        </small>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fonctionnaire</th>
                                <th>CIN / PPR</th>
                                <th>Formation</th>
                                <th>Type</th>
                                <th>Détails</th>
                                <th>Statut</th>
                                <th>Niveau</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($demandes as $d)
                            <tr>
                                <td>
                                    <strong>{{ $d->id }}</strong>
                                    @if($d->numero_demande)
                                        <br><span class="badge bg-primary">{{ $d->numero_demande }}</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $d->nom }} {{ $d->prenom }}</strong><br>
                                    <small class="text-muted">{{ $d->email_fonctionnaire }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $d->cin }}</span><br>
                                    <span class="badge bg-info mt-1">{{ $d->ppr }}</span>
                                </td>
                                <td>
                                    @if($d->nomFormationSanitaire)
                                        <small>{{ $d->nomFormationSanitaire->nom }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($d->type_demande === 'conge')
                                        <span class="badge bg-success">Congé</span>
                                    @elseif($d->type_demande === 'attestation')
                                        <span class="badge bg-primary">Attestation</span>
                                    @else
                                        <span class="badge bg-warning">Autre</span>
                                    @endif
                                </td>
                                <td>
                                    @if($d->type_demande === 'conge' && $d->data)
                                        @php
                                            $data = is_string($d->data) ? json_decode($d->data, true) : $d->data;
                                        @endphp
                                        @if($data && is_array($data))
                                            <small>
                                                <strong>Du:</strong> {{ $data['date_debut'] ?? '-' }}<br>
                                                <strong>Au:</strong> {{ $data['date_fin'] ?? '-' }}<br>
                                                @if(!empty($data['lieu_passage']))
                                                    <strong>Lieu:</strong> {{ $data['lieu_passage'] }}<br>
                                                @endif
                                                @if(!empty($data['adresse']))
                                                    <strong>Adresse:</strong> {{ $data['adresse'] }}<br>
                                                @endif
                                                @if(!empty($data['remplacant']))
                                                    <strong>Remplaçant:</strong> {{ $data['remplacant'] }}
                                                @endif
                                            </small>
                                        @endif
                                    @elseif($d->type_demande === 'attestation')
                                        <small class="text-info">Attestation de travail</small>
                                    @elseif($d->type_demande === 'autre' && $d->data)
                                        @php
                                            $data = is_string($d->data) ? json_decode($d->data, true) : $d->data;
                                        @endphp
                                        @if($data && is_array($data) && !empty($data['description']))
                                            <small>{{ Str::limit($data['description'], 50) }}</small>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($d->status === 'approved')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Approuvé
                                        </span>
                                    @elseif($d->status === 'rejected')
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> Rejeté
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> En attente
                                        </span>
                                    @endif
                                    @if($d->decision)
                                        <br>
                                        <span class="badge bg-success mt-1">
                                            <i class="fas fa-file-check"></i> Décision créée
                                        </span>
                                        @if($d->decision->numero_decision)
                                            <br>
                                            <small class="text-muted">N° {{ $d->decision->numero_decision }}</small>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{ ($d->approval_level / 4) * 100 }}%">
                                            {{ $d->approval_level }}/4
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $d->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group-vertical" role="group">
                                        <!-- Voir -->
                                        <a href="{{ route('demandes.show', $d) }}" class="btn btn-sm btn-info mb-1" title="Voir détails">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Approuver (si niveau correspond) -->
                                        @if($d->status === 'pending' && $d->approval_level < 4)
                                            @if($userLevel === null || $d->approval_level === $userLevel - 1)
                                                @can('demandes.approve')
                                                    <form method="post" action="{{ route('demandes.approve', $d) }}" class="d-inline mb-1">
                                                        @csrf
                                                        <button class="btn btn-sm btn-success w-100" type="submit" title="Approuver">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                        @endif

                                        <!-- Créer décision (si niveau 4 atteint) -->
                                        @if($d->status === 'approved' && !$d->decision_id && $d->approval_level >= 4)
                                            @can('demandes.decide')
                                                <a href="{{ route('demandes.decide', $d) }}" class="btn btn-sm btn-primary mb-1 w-100" title="Créer décision">
                                                    <i class="fas fa-file-alt"></i> Décision
                                                </a>
                                            @endcan
                                        @endif

                                        <!-- Voir fichier décision (si existe) -->
                                        @if($d->decision && $d->decision->fichier_decision)
                                            <a href="{{ asset('storage/' . $d->decision->fichier_decision) }}"
                                               class="btn btn-sm btn-success mb-1 w-100"
                                               target="_blank"
                                               title="Voir le fichier de décision">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </a>
                                        @endif

                                        <!-- Modifier -->
                                        @can('demandes.manage')
                                            <a href="{{ route('demandes.edit', $d) }}" class="btn btn-sm btn-warning mb-1" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan

                                        <!-- Supprimer -->
                                        @can('demandes.manage')
                                            <form method="post" action="{{ route('demandes.destroy', $d) }}" class="d-inline"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger w-100" type="submit" title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Aucune demande trouvée</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $demandes->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<x-foot />
