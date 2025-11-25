<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template" />

    <link rel="apple-touch-icon" sizes="180x180" href="../../../app-assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../app-assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../app-assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../app-assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../../app-assets/favicon/safari-pinned-tab.svg" color="#00652B">
    <meta name="msapplication-TileColor" content="#00652B">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugin/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/icons/iconly/index.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/icons/remix-icon/index.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/base/font-control.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/base/typography.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/base/base.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/theme/colors-dark.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/theme/theme-dark.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom-rtl.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/sider.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/header.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">

    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

    <title>Login - {{ config('app.name', 'SiRestu') }}</title>
</head>

<body>
    <div class="row hp-authentication-page">
        <div class="col-12 col-lg-6 bg-primary-4 hp-bg-color-dark-90 position-relative">
            <div class="row hp-image-row h-100 px-8 px-sm-16 px-md-0 pb-32 pb-sm-0 pt-32 pt-md-0">
                <div class="col-12 hp-logo-item m-16 m-sm-32 m-md-64 w-auto px-0">
                    <img class="hp-dark-none" src="../../../app-assets/img/logo/logo-vector-blue.svg" alt="Logo">
                    <img class="hp-dark-block" src="../../../app-assets/img/logo/logo-vector.svg" alt="Logo">
                </div>

                <div class="col-12">
                    <div class="row align-items-center justify-content-center h-100">
                        <div class="col-12 col-md-10 hp-bg-item text-center mb-32 mb-md-0">
                            <img class="hp-dark-none m-auto"
                                src="../../../app-assets/img/pages/authentication/authentication-bg.svg"
                                alt="Background Image">
                            <img class="hp-dark-block m-auto"
                                src="../../../app-assets/img/pages/authentication/authentication-bg-dark.svg"
                                alt="Background Image">
                        </div>

                        <div class="col-12 col-md-11 col-lg-9 hp-text-item text-center">
                            <h2 class="text-primary-1 hp-text-color-dark-0 mx-16 mx-lg-0 mb-16">Very good works are
                                waiting for you 🤞</h2>
                            <p class="mb-0 text-black-80 hp-text-color-dark-30">Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 py-sm-64 py-lg-0">
            <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
                <div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
                    <h1 class="mb-0 mb-sm-24">Masuk</h1>
                    <p class="mt-sm-8 mt-sm-0 text-black-60">Selamat Datang, Silahkan masuk terlebih dahulu.</p>

                    <form method="POST" action="{{ route('login') }}" class="mt-16 mt-sm-32 mb-8">
                        @csrf

                        <div class="mb-16">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-16">
                            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row align-items-center justify-content-between mb-16">
                            <div class="col hp-flex-none w-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label ps-4" for="remember">
                                        {{ __('Ingat Saya') }}</label>
                                </div>
                            </div>

                            <div class="col hp-flex-none w-auto">
                                <a class="hp-button text-black-80 hp-text-color-dark-40"
                                    href="{{ route('password.request') }}">{{ __('Lupa Kata Sandi?') }}</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <a class="d-block w-100" style="color: inherit;">{{ __('Masuk') }}</a>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="../../../app-assets/js/plugin/jquery.min.js"></script>
    <script src="../../../app-assets/js/plugin/bootstrap.bundle.min.js"></script>
    <script src="../../../app-assets/js/plugin/swiper-bundle.min.js"></script>
    <script src="../../../app-assets/js/plugin/jquery.mask.min.js"></script>
    <script src="../../../app-assets/js/plugin/autocomplete.min.js"></script>
    <script src="../../../app-assets/js/plugin/moment.min.js"></script>

    <script src="../../../app-assets/js/layouts/header-search.js"></script>
    <script src="../../../app-assets/js/layouts/sider.js"></script>
    <script src="../../../app-assets/js/components/input-number.js"></script>

    <script src="../../../app-assets/js/base/index.js"></script>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
