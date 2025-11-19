<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Mot de passe oublié - Application GRH</title>
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
                            <h3>Mot de passe oublié</h3>
                            <h4>Vérification d'identité sécurisée</h4>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            </div>
                        @endif

                        @if(session('reset_link'))
                            <div class="alert alert-warning" style="background: #fff3cd; border: 2px solid #ffc107;">
                                <h5><i class="fas fa-link"></i> Lien de réinitialisation</h5>
                                <p><strong>Copiez ce lien et ouvrez-le dans votre navigateur :</strong></p>
                                <div class="input-group mb-3">
                                    <input type="text" id="resetLink" class="form-control" value="{{ session('reset_link') }}" readonly style="font-size: 12px;">
                                    <button class="btn btn-primary" type="button" onclick="copyLink()">
                                        <i class="fas fa-copy"></i> Copier
                                    </button>
                                </div>
                                <button type="button" class="btn btn-success w-100" onclick="window.location.href='{{ session('reset_link') }}'">
                                    <i class="fas fa-arrow-right"></i> Ouvrir le lien maintenant
                                </button>
                                <p class="mt-2 mb-0"><small><i class="fas fa-clock"></i> Ce lien est valable pendant 60 minutes.</small></p>
                            </div>

                            <script>
                            function copyLink() {
                                var copyText = document.getElementById("resetLink");
                                copyText.select();
                                copyText.setSelectionRange(0, 99999);
                                document.execCommand("copy");
                                alert("Lien copié ! Vous pouvez maintenant le coller dans votre navigateur.");
                            }
                            </script>
                        @endif

                        @if(!session('reset_link'))
                        <div class="alert alert-info">
                            <i class="fas fa-shield-alt"></i> <strong>Sécurité Renforcée :</strong> Pour vérifier votre identité, vous devez fournir 4 informations personnelles.
                        </div>
                        @endif

                        <form method="post" action="{{ route('demandes.send-reset-link') }}">
                            @csrf
                            <div class="form-login mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email_fonctionnaire" required class="form-control" placeholder="Votre email" value="{{ old('email_fonctionnaire') }}">
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">PPR * (Numéro Matricule)</label>
                                <input type="text" name="ppr" required class="form-control" placeholder="Votre PPR" value="{{ old('ppr') }}">
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Date de naissance *</label>
                                <input type="date" name="date_naissance" required class="form-control" value="{{ old('date_naissance') }}">
                                <small class="text-muted">Format: JJ/MM/AAAA</small>
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Date de recrutement * (Date d'embauche)</label>
                                <input type="date" name="date_embauche" required class="form-control" value="{{ old('date_embauche') }}">
                                <small class="text-muted">Votre première date d'embauche dans l'administration</small>
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login w-100" type="submit">
                                    <i class="fas fa-paper-plane"></i> Envoyer le lien
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('demandes.mine') }}" class="text-primary">
                                <i class="fas fa-arrow-left"></i> Retour à la connexion
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('demandes.create') }}" class="text-success">
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
