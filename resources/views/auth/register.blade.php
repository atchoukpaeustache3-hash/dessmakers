
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Inscription sur | Expedit New Style - Conçu et developper par la Légende Technologie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/back/assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{ asset('storage/back/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('storage/back/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('storage/back/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('storage/back/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('storage/back/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.html" class="d-block">
                                                    <img src="{{ asset('storage/back/assets/images/logo-light.png')}}" alt="" height="18">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Créer un compte </h5>
                                            <p class="text-muted">Créez votre compte gratuit dès maintenant.</p>
                                        </div>

                                        <div class="mt-4">
                                             <form method="POST" action="{{ route('register') }}">
                                             @csrf

                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input  class="form-control" id="useremail" placeholder="Saisissez votre adresse email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                     <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                                    <div class="invalid-feedback">
                                                        Le champs Email est vide 
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Nom <span class="text-danger">*</span></label>
                                                    <input  class="form-control" id="username" placeholder="Saisissez votre nom d'utilisateur" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                         <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    <div class="invalid-feedback">
                                                       Le champs Nom est vide
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Mot de passe</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input  class="form-control pe-5 password-input" onpaste="return false" placeholder="Saisissez le mot de passe" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  type="password"
                                                                                                                            name="password"
                                                                                                                            required autocomplete="new-password" /> 

                                                             <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Le champs mot de passe est vide
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">confirmez le mot de passe</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input  class="form-control pe-5 password-input" onpaste="return false" placeholder="confirmation mot de passe" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   type="password"
                                                                          name="password_confirmation" required autocomplete="new-password" />

                                              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Le champs confirmation mot de passe est vide
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <p class="mb-0 fs-12 text-muted fst-italic">En vous inscrivant, vous acceptez les conditions d'utilisation de Expedit New Style. <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Condition d'utilisation</a></p>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Contrainte du mot de passe:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characteres</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">S'inscrire</button>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Vous avez déja un compte ? <a href="{{ route('logine') }}" class="fw-semibold text-primary text-decoration-underline"> Se connecter</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('storage/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('storage/back/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('storage/back/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('storage/back/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('storage/back/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{ asset('storage/back/assets/js/plugins.js')}}"></script>

    <!-- validation init -->
    <script src="{{ asset('storage/back/assets/js/pages/form-validation.init.js')}}"></script>
    <!-- password create init -->
    <script src="{{ asset('storage/back/assets/js/pages/passowrd-create.init.js')}}"></script>
</body>

</html>
