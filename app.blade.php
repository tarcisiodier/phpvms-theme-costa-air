<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <title>@yield('title') - {{ config('app.name') }}</title>
    <script>
        (function() {
            if (localStorage.getItem('theme') === 'dark' || ((!localStorage.getItem('theme') || localStorage.getItem(
                    'theme') === 'system') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.setAttribute('data-bs-theme', "dark")
            }
        })();
    </script>

    {{-- Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things --}}
    <meta name="base-url" content="{!! url('') !!}">
    <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key : '' !!}">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    {{-- End the required lines block --}}

    <link rel="shortcut icon" type="image/png" href="{{ public_asset('/assets/img/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent/3.1.1/cookieconsent.min.css"
        integrity="sha512-LQ97camar/lOliT/MqjcQs5kWgy6Qz/cCRzzRzUCfv0fotsCTC9ZHXaPQmJV8Xu/PVALfJZ7BDezl5lW3/qBxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <link href="{{ public_asset('/assets/vendor/tomselect/tom-select.bootstrap5.css') }}" rel="stylesheet">

    {{-- Start of the required files in the head block --}}
    @yield('css')
    @yield('scripts_head')
    {{-- End of the required stuff in the head block --}}

    <style>
        :root {
            --costa-air-red: #ff2800;
            --costa-air-red-dark: #c41e00;
            --costa-air-gold: #ffd700;
            --bs-primary: var(--costa-air-red) !important;
            --bs-primary-rgb: 255, 40, 0 !important;
        }

        [data-bs-theme=light] {
            --bs-primary: var(--costa-air-red) !important;
            --bs-primary-rgb: 255, 40, 0 !important;
        }

        [data-bs-theme=dark] {
            --bs-primary: var(--costa-air-red) !important;
            --bs-primary-rgb: 255, 40, 0 !important;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .navbar.bg-primary {
            background: linear-gradient(135deg, var(--costa-air-red-dark) 0%, var(--costa-air-red) 100%) !important;
            box-shadow: 0 2px 12px rgba(255, 40, 0, 0.35);
        }

        .nav-link:hover,
        .navbar-brand:hover {
            color: var(--costa-air-gold) !important;
        }

        .bg-primary {
            background-color: var(--costa-air-red) !important;
        }

        .btn-primary {
            background-color: var(--costa-air-red) !important;
            border-color: var(--costa-air-red-dark) !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--costa-air-red-dark) !important;
            border-color: #9a1800 !important;
        }

        .text-primary {
            color: var(--costa-air-red) !important;
        }

        .border-primary {
            border-color: var(--costa-air-red) !important;
        }

        a:not(.nav-link):not(.btn):not(.dropdown-item) {
            color: var(--costa-air-red);
        }

        a:not(.nav-link):not(.btn):not(.dropdown-item):hover {
            color: var(--costa-air-red-dark);
        }
    </style>
</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100">
        @include('nav')
        <div class="body container flex-grow-1 pt-4">
            @include('flash.message')
            @yield('content')
        </div>
        <footer class="py-3 mt-4 border-top">
            <div class="container d-flex flex-wrap justify-content-between align-items-center">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-body-secondary">Copyright {{ date('Y') }}
                        {{ config('app.name') }}</span>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end">
                    <span class="mb-3 mb-md-0 text-body-secondary text-end">Powered by <a href="https://www.phpvms.net"
                            target="_blank">phpVMS</a></span>
                </div>
            </div>
        </footer>
    </div>

    @include('external_redirect_modal')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>

    @yield('scripts')

    @include('scripts.bs_theme')

    <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                palette: {
                    popup: {
                        background: "#1a1a1a",
                        text: "#f5f5f5"
                    },
                    button: {
                        "background": "#ff2800"
                    }
                },
                position: "top",
            })
        });
    </script>

    @php
        $gtag = setting('general.google_analytics_id');
    @endphp
    @if ($gtag)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $gtag }}');
        </script>
    @endif

</body>

</html>
