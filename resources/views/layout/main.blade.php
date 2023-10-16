<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookpad - Make everyday cooking fun!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand d-none d-sm-block" href="/">
                    <img src="{{ url('img\cookpad.png') }}" alt="" width="36"
                        class="d-inline-block align-text-center me-2">cookpad</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav d-flex ms-auto">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white"
                                    href="/"><i class="bi bi-house mx-2"></i>Feed</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white"
                                    href="/search"><i class="bi bi-search mx-2"></i>Search</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white"
                                    href="/create"><i class="bi bi-plus-square mx-2"></i>Create</a></li>
                            @if (Auth::check())
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white"
                                        href="/activity"><i class="bi bi-chat-right mx-2"></i>Activity</a></li>
                                <li class="nav-item mx-0 mx-lg-1">
                            @endif
                            @if (Auth::check() && count($errors) == 0)
                                <a class="nav-link py-3 px-0 px-lg-3 text-white" href="{{ url('/profile') }}">
                                    <i class="bi bi-person mx-2"></i>{{ Auth::user()->username }}
                                </a>
                            @else
                                <a class="nav-link py-3 px-0 px-lg-3 text-white" href="/login">
                                    <i class="bi bi-person mx-2"></i>Login
                                </a>
                            @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @yield('konten')

    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mt-1">
                        <strong class="mb-2">About Us</strong>
                        <p class="mt-2 mb-0 fs-6">Our mission at Cookpad is to <b>make everyday cooking fun</b>, because
                            we
                            believe
                            that cooking is key to a happier and healthier life for people, communities and the planet.
                            We empower homecooks all over the world to <b>help each other</b> by sharing recipes and
                            cooking
                            tips.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-1">
                        <strong class="mb-2">Learn More</strong>
                        <ul class="list-unstyled mt-1">
                            <li class="mb-1"><a href="#">Careers</a></li>
                            <li class="mb-1"><a href="#">Feedback</a></li>
                            <li class="mb-1"><a href="#">Terms of Service</a></li>
                            <li class="mb-1"><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <strong class="mt-2">Download our app</strong>
                    <div class="my-3">
                        <a href="https://apps.apple.com/gb/app/id585332633?ls=1"><img
                                src="{{ url('img\button_apple_app_store.svg') }}" alt="App Store">
                        </a>
                        <a
                            href="https://play.google.com/store/apps/details?hl=en&id=com.mufumbo.android.recipe.search&referrer=utm_campaign%3Dstandard%26utm_medium%3Dfooter%26utm_source%3Dcookpad-global-web"><img
                                src="{{ url('img\button_google_play_store.svg') }}" alt="Google Play"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p class="fs-7 mt-2">Copyright &copy; Kelompok 3B All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
