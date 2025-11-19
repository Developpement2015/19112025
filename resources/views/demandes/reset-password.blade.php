<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Réinitialiser le mot de passe - Application GRH</title>
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
                            <h3>Réinitialiser le mot de passe</h3>
                            <h4>Entrez votre nouveau mot de passe</h4>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('demandes.reset-password') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-login mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $email }}" disabled>
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Nouveau mot de passe * (minimum 4 caractères)</label>
                                <input type="password" name="password" required minlength="4" class="form-control" placeholder="Nouveau mot de passe">
                            </div>

                            <div class="form-login mb-3">
                                <label class="form-label">Confirmez le mot de passe *</label>
                                <input type="password" name="password_confirmation" required minlength="4" class="form-control" placeholder="Confirmez le mot de passe">
                            </div>

                            <div class="form-login">
                                <button class="btn btn-login w-100" type="submit">
                                    <i class="fas fa-key"></i> Réinitialiser le mot de passe
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('demandes.mine') }}" class="text-primary">
                                <i class="fas fa-arrow-left"></i> Retour à la connexion
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
