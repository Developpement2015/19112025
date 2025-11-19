<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Consulter mes demandes - Application GRH</title>
    <link rel="shortcut icon" type="image/x-icon" href="/html/assets/img/logo.png">
    <link rel="stylesheet" href="/html/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/html/assets/css/style.css">
</head>
<body class="account-page">

<div id="global-loader">
    <div class="whirly-loader"></div>
</div>

<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper login-new">
            <div class="container">
                <div class="login-content user-login">
                    <div class="login-logo">
                        <img src="/html/assets/img/logo.png" alt="img">
                    </div>

                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Consulter mes demandes</h3>
                            <h4>Connectez-vous avec votre email et mot de passe</h4>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(isset($error))
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endif

                        @if(!isset($demandes))
                        <form method="post" action="{{ route('demandes.mine') }}">
                            @csrf
                            <div class="form-login mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email_fonctionnaire" required class="form-control" placeholder="Votre email">
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Mot de passe *</label>
                                <input type="password" name="password" required class="form-control" placeholder="Votre mot de passe">
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login w-100" type="submit">Se connecter</button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('demandes.forgot-password') }}" class="text-primary">
                                    <i class="fas fa-lock"></i> Mot de passe oublié ?
                                </a>
                            </div>
                        </form>
                        @endif

                        @if(isset($demandes))
                        <div class="mb-3">
                            <h5>Mes demandes ({{ $demandes->count() }})</h5>
                        </div>

                        @forelse($demandes as $d)
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Demande #{{ $d->id }}</strong> -
                                        @if($d->type_demande === 'conge')
                                            <span class="badge bg-primary">Demande congés</span>
                                        @elseif($d->type_demande === 'attestation')
                                            <span class="badge bg-info">Attestation travail</span>
                                        @else
                                            <span class="badge bg-secondary">Autre demande</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if($d->status === 'approved')
                                            <span class="badge bg-success">✓ Approuvé</span>
                                        @elseif($d->status === 'rejected')
                                            <span class="badge bg-danger">✗ Rejeté</span>
                                        @else
                                            <span class="badge bg-warning">⏳ En attente</span>
                                        @endif
                                        <span class="badge bg-dark">Niveau {{ $d->approval_level }}/3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Informations personnelles</h6>
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="40%"><strong>PPR:</strong></td>
                                                <td>{{ $d->ppr ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nom:</strong></td>
                                                <td>{{ $d->nom }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Prénom:</strong></td>
                                                <td>{{ $d->prenom }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>CIN:</strong></td>
                                                <td>{{ $d->cin ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email:</strong></td>
                                                <td>{{ $d->email_fonctionnaire }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Formation sanitaire:</strong></td>
                                                <td>{{ $d->nomFormationSanitaire->nom ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Détails de la demande</h6>
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="40%"><strong>Type:</strong></td>
                                                <td>
                                                    @if($d->type_demande === 'conge')
                                                        Demande de congés
                                                    @elseif($d->type_demande === 'attestation')
                                                        Attestation de travail
                                                    @else
                                                        Autre demande
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date soumission:</strong></td>
                                                <td>{{ $d->created_at->format('d/m/Y à H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Statut:</strong></td>
                                                <td>
                                                    @if($d->status === 'approved')
                                                        <span class="text-success">Approuvé</span>
                                                    @elseif($d->status === 'rejected')
                                                        <span class="text-danger">Rejeté</span>
                                                    @else
                                                        <span class="text-warning">En cours de traitement</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Approbations:</strong></td>
                                                <td>
                                                    <div class="progress" style="height: 20px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                             style="width: {{ ($d->approval_level / 4) * 100 }}%">
                                                            {{ $d->approval_level }}/4
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                        @if($d->type_demande === 'conge' && $d->data)
                                            <h6 class="mt-3">Détails du congé</h6>
                                            <table class="table table-sm">
                                                @if(isset($d->data['duree']))
                                                <tr>
                                                    <td width="40%"><strong>Durée:</strong></td>
                                                    <td>{{ $d->data['duree'] }} jours</td>
                                                </tr>
                                                @endif
                                                @if(isset($d->data['debut']))
                                                <tr>
                                                    <td><strong>Date début:</strong></td>
                                                    <td>{{ \Carbon\Carbon::parse($d->data['debut'])->format('d/m/Y') }}</td>
                                                </tr>
                                                @endif
                                                @if(isset($d->data['type_conge']))
                                                <tr>
                                                    <td><strong>Type de congé:</strong></td>
                                                    <td>{{ $d->data['type_conge'] }}</td>
                                                </tr>
                                                @endif
                                            </table>
                                        @endif

                                        @if($d->type_demande === 'autre' && isset($d->data['autre_detail']))
                                            <h6 class="mt-3">Précisions</h6>
                                            <div class="alert alert-light">
                                                {{ $d->data['autre_detail'] }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if($d->decision_id && $d->decision)
                                <div class="mt-3">
                                    <div class="alert alert-success">
                                        <h6><i class="fas fa-check-circle"></i> Décision finale</h6>
                                        <p><strong>Type:</strong> {{ $d->decision->type }}</p>
                                        <p><strong>Date:</strong> {{ $d->decision->created_at->format('d/m/Y à H:i') }}</p>
                                        @if($d->decision->data)
                                            <p><strong>Détails:</strong> {{ json_encode($d->decision->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</p>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Vous n'avez aucune demande enregistrée.
                        </div>
                        @endforelse
                            </table>
                        </div>
                        @endif

                        <div class="text-center mt-4">
                            <a href="{{ route('demandes.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Nouvelle demande
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/html/assets/js/jquery-3.7.1.min.js"></script>
<script src="/html/assets/js/feather.min.js"></script>
<script src="/html/assets/js/bootstrap.bundle.min.js"></script>
<script src="/html/assets/js/script.js"></script>

</body>
</html>
