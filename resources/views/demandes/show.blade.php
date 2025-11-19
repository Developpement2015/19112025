<x-head titre="Détails de la demande" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex justify-content-between align-items-center w-100">
                <div class="page-title">
                    <h4>Détails de la demande #{{ $demande->id }}</h4>
                    @if($demande->numero_demande)
                        <h6><span class="badge bg-primary">{{ $demande->numero_demande }}</span></h6>
                    @endif
                    <h6 class="text-muted">Informations complètes</h6>
                </div>
                <div>
                    <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Informations du fonctionnaire -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-user"></i> Informations du Fonctionnaire</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Nom complet :</th>
                                <td><strong>{{ $demande->nom }} {{ $demande->prenom }}</strong></td>
                            </tr>
                            <tr>
                                <th>CIN :</th>
                                <td><span class="badge bg-secondary">{{ $demande->cin }}</span></td>
                            </tr>
                            <tr>
                                <th>PPR :</th>
                                <td><span class="badge bg-info">{{ $demande->ppr }}</span></td>
                            </tr>
                            <tr>
                                <th>Email :</th>
                                <td>{{ $demande->email_fonctionnaire }}</td>
                            </tr>
                            <tr>
                                <th>Formation sanitaire :</th>
                                <td>
                                    @if($demande->nomFormationSanitaire)
                                        {{ $demande->nomFormationSanitaire->nom }}
                                    @else
                                        <span class="text-muted">Non spécifié</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Statut de la demande -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Statut de la Demande</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            @if($demande->numero_demande)
                            <tr>
                                <th width="40%">Numéro de demande :</th>
                                <td><span class="badge bg-primary fs-6">{{ $demande->numero_demande }}</span></td>
                            </tr>
                            @endif
                            <tr>
                                <th width="40%">Type de demande :</th>
                                <td>
                                    @if($demande->type_demande === 'conge')
                                        <span class="badge bg-success">Congé</span>
                                    @elseif($demande->type_demande === 'attestation')
                                        <span class="badge bg-primary">Attestation de travail</span>
                                    @else
                                        <span class="badge bg-warning">Autre</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Statut :</th>
                                <td>
                                    @if($demande->status === 'approved')
                                        <span class="badge bg-success fs-6">
                                            <i class="fas fa-check-circle"></i> Approuvé
                                        </span>
                                    @elseif($demande->status === 'rejected')
                                        <span class="badge bg-danger fs-6">
                                            <i class="fas fa-times-circle"></i> Rejeté
                                        </span>
                                    @else
                                        <span class="badge bg-warning fs-6">
                                            <i class="fas fa-clock"></i> En attente
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Niveau d'approbation :</th>
                                <td>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: {{ ($demande->approval_level / 4) * 100 }}%">
                                            <strong>{{ $demande->approval_level }}/4</strong>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Date de soumission :</th>
                                <td>{{ $demande->created_at->format('d/m/Y à H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Dernière modification :</th>
                                <td>{{ $demande->updated_at->format('d/m/Y à H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Détails spécifiques selon le type -->
            @if($demande->data)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-file-alt"></i> Détails de la Demande</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $data = is_string($demande->data) ? json_decode($demande->data, true) : $demande->data;
                            @endphp

                            @if($demande->type_demande === 'conge' && $data)
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th width="40%">Date de début :</th>
                                                <td><strong>{{ $data['date_debut'] ?? '-' }}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Date de fin :</th>
                                                <td><strong>{{ $data['date_fin'] ?? '-' }}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Nombre de jours :</th>
                                                <td>
                                                    @if(isset($data['date_debut']) && isset($data['date_fin']))
                                                        @php
                                                            $debut = \Carbon\Carbon::parse($data['date_debut']);
                                                            $fin = \Carbon\Carbon::parse($data['date_fin']);
                                                            $jours = $debut->diffInDays($fin) + 1;
                                                        @endphp
                                                        <span class="badge bg-primary">{{ $jours }} jour(s)</span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th width="40%">Lieu de passage :</th>
                                                <td>{{ $data['lieu_passage'] ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Adresse :</th>
                                                <td>{{ $data['adresse'] ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Remplaçant :</th>
                                                <td>{{ $data['remplacant'] ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @elseif($demande->type_demande === 'autre' && $data)
                                <div class="alert alert-info">
                                    <strong>Description :</strong><br>
                                    {{ $data['description'] ?? 'Aucune description fournie' }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Décision (si existe) -->
            @if($demande->decision)
                <div class="col-md-12 mb-4">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-gavel"></i> Décision</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="40%">Numéro de décision :</th>
                                            <td>
                                                @if($demande->decision->numero_decision)
                                                    <strong class="text-primary">{{ $demande->decision->numero_decision }}</strong>
                                                @else
                                                    <span class="text-muted">Non spécifié</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Type :</th>
                                            <td>
                                                @if($demande->decision->type === 'conge')
                                                    <span class="badge bg-success">Congé</span>
                                                @elseif($demande->decision->type === 'attestation')
                                                    <span class="badge bg-primary">Attestation</span>
                                                @else
                                                    <span class="badge bg-warning">{{ ucfirst($demande->decision->type) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Créée le :</th>
                                            <td>{{ $demande->decision->created_at->format('d/m/Y à H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    @if($demande->decision->fichier_decision)
                                        <div class="text-center p-4 bg-light rounded">
                                            <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>
                                            <br>
                                            <a href="{{ asset('storage/' . $demande->decision->fichier_decision) }}"
                                               class="btn btn-danger btn-lg"
                                               target="_blank">
                                                <i class="fas fa-download"></i> Télécharger le PDF
                                            </a>
                                        </div>
                                    @else
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i> Aucun fichier PDF disponible
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if($demande->decision->observations)
                                <div class="mt-3">
                                    <strong><i class="fas fa-comment"></i> Observations :</strong>
                                    <div class="alert alert-light mt-2">
                                        {{ $demande->decision->observations }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-cogs"></i> Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 flex-wrap">
                            <!-- Approuver -->
                            @if($demande->status === 'pending' && $demande->approval_level < 4)
                                @can('demandes.approve')
                                    <form method="post" action="{{ route('demandes.approve', $demande) }}">
                                        @csrf
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-check"></i> Approuver (Niveau {{ $demande->approval_level + 1 }})
                                        </button>
                                    </form>
                                @endcan
                            @endif

                            <!-- Créer décision -->
                            @if($demande->status === 'approved' && !$demande->decision_id && $demande->approval_level >= 4)
                                @can('demandes.decide')
                                    <form method="post" action="{{ route('demandes.decide', $demande) }}">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-file-alt"></i> Créer la Décision
                                        </button>
                                    </form>
                                @endcan
                            @endif

                            <!-- Modifier -->
                            @can('demandes.manage')
                                <a href="{{ route('demandes.edit', $demande) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                            @endcan

                            <!-- Supprimer -->
                            @can('demandes.manage')
                                <form method="post" action="{{ route('demandes.destroy', $demande) }}"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            @endcan

                            <!-- Retour -->
                            <a href="{{ route('demandes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Retour à la liste
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-foot />
