<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Soumettre une demande - Application GRH</title>
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
                            <h3>Soumettre une demande</h3>
                            <h4>Formulaire de demande (congés, attestation, autre)</h4>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('demandes.store') }}">
                            @csrf

                            <div class="form-login mb-3">
                                <label class="form-label">PPR</label>
                                <input name="ppr" class="form-control" value="{{ old('ppr') }}" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Nom *</label>
                                <input name="nom" required class="form-control" value="{{ old('nom') }}" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Prénom *</label>
                                <input name="prenom" required class="form-control" value="{{ old('prenom') }}" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">CIN</label>
                                <input name="cin" class="form-control" value="{{ old('cin') }}" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email_fonctionnaire" required class="form-control" value="{{ old('email_fonctionnaire') }}" />
                                <small class="text-muted">Utilisez cet email pour consulter vos demandes</small>
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Mot de passe * (minimum 4 caractères)</label>
                                <input type="password" name="password" required minlength="4" class="form-control" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Confirmez le mot de passe *</label>
                                <input type="password" name="password_confirmation" required minlength="4" class="form-control" />
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Formation sanitaire</label>
                                <select name="nom_formation_sanitaire_id" class="form-control">
                                    <option value="">-- Aucun --</option>
                                    @foreach($formations as $f)
                                        <option value="{{ $f->id }}">{{ $f->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Type de demande *</label>
                                <select name="type_demande" class="form-control" required onchange="onTypeChange(this.value)">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="conge">Demande congés</option>
                                    <option value="attestation">Demande attestation travail</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>

                            <div id="conge_fields" style="display:none">
                                <div class="form-login mb-3">
                                    <label class="form-label">Durée (jours)</label>
                                    <input type="number" name="data[duree]" class="form-control" />
                                </div>
                                <div class="form-login mb-3">
                                    <label class="form-label">Date début</label>
                                    <input type="date" name="data[debut]" class="form-control" />
                                </div>
                                <div class="form-login mb-3">
                                    <label class="form-label">Type de congé</label>
                                    <input name="data[type_conge]" class="form-control" />
                                </div>
                            </div>

                            <div id="autre_fields" style="display:none">
                                <div class="form-login mb-3">
                                    <label class="form-label">Précisez</label>
                                    <textarea name="data[autre_detail]" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Captcha: {{ $captcha_question }} *</label>
                                <input name="captcha" class="form-control" required />
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login w-100" type="submit">Soumettre la demande</button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('demandes.mine') }}" class="text-primary">Consulter mes demandes</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function onTypeChange(v){
    document.getElementById('conge_fields').style.display = v === 'conge' ? 'block' : 'none';
    document.getElementById('autre_fields').style.display = v === 'autre' ? 'block' : 'none';
}
// Les champs sont cachés par défaut (affichage seulement quand l'utilisateur sélectionne)
</script>

<script src="/html/assets/js/jquery-3.7.1.min.js"></script>
<script src="/html/assets/js/feather.min.js"></script>
<script src="/html/assets/js/bootstrap.bundle.min.js"></script>
<script src="/html/assets/js/script.js"></script>

</body>
</html>
