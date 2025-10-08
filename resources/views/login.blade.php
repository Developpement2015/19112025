<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Se Connecter - Application Service GRH-DMSPS Fès</title>

		<script src="/html/assets/js/theme-script.js" type="3ae823559d2536916a3a4ca0-text/javascript"></script>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/html/assets/img/logo.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/html/assets/css/bootstrap.min.css">

        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="/html/assets/css/style.css">

    </head>
    <body class="account-page">

        <div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div>

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper login-new">
                    <div class="container">
                        <div class="login-content user-login">
                            <div class="login-logo">
                                <img src="/html/assets/img/logo.png" alt="img">
                                <a href="index.html" class="login-logo logo-white">
                                    <img src="/html/assets/img/logo-white.png"  alt="">
                                </a>
                            </div>
                            <form action="{{ route('login.post') }}" method="post">
                                @csrf
                                <div class="login-userset">
                                    <div class="login-userheading">
                                        <h3>Se Connecter</h3>
                                        <h4>Veuillez saisir votre adresse email et votre mot de passe.</h4>
                                    </div>
                                    <div class="form-login">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="form-addons">
                                            <input type="text" name="email" id="email" class="form-control">
                                            <img src="/html/assets/img/icons/mail.svg" alt="img">
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <label class="form-label" for="password">Mot De Passe</label>
                                        <div class="pass-group">
                                            <input type="password" class="pass-input" name="password" id="password">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                    </div>
                                    <div class="form-login authentication-check">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                        <input type="checkbox" name="remember"  value="1"
                                                         class="custom-control-input">
                                                        <span class="checkmarks"></span>Se Souvenir de moi
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <button class="btn btn-login" type="submit">Se Connecter</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                            <p>Copyright &copy; KADDOURI MED DMSPS - FES {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		<div class="customizer-links" id="setdata">
			<ul class="sticky-sidebar">
				<li class="sidebar-icons">
					<a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
						data-bs-original-title="Theme">
						<i data-feather="settings" class="feather-five"></i>
					</a>
				</li>
			</ul>
		</div>

		<!-- jQuery -->
        <script src="/html/assets/js/jquery-3.7.1.min.js" type="3ae823559d2536916a3a4ca0-text/javascript"></script>

         <!-- Feather Icon JS -->
		<script src="/html/assets/js/feather.min.js" type="3ae823559d2536916a3a4ca0-text/javascript"></script>

		<!-- Bootstrap Core JS -->
        <script src="/html/assets/js/bootstrap.bundle.min.js" type="3ae823559d2536916a3a4ca0-text/javascript"></script>

		<!-- Custom JS -->
<script src="/html/assets/js/script.js" type="3ae823559d2536916a3a4ca0-text/javascript"></script>
@if (session('error'))
    <x-alerts type="error" msg="{{ session('error') }}" />
@endif


@if (session('success'))
    <x-alerts type="success" msg="{{ session('success') }}" />
@endif

    <script src="/html/assets/js/rocket-loader.min.js" data-cf-settings="3ae823559d2536916a3a4ca0-|49" defer></script></body>
</html>
