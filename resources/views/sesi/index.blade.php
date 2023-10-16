<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookpad - Make everyday cooking fun!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/bc3cf86588.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="bg-dark">
    <div style="display: flex; align-items: center; height: 100vh;">
        <div class="card bg-light text-dark w-25 center border rounded px-3 py-3 mx-auto">
            <div class="card-body" style="background: color #f9eea9;">
                <div><img src="{{ url('img\cookpad.png') }}" alt="" width="36"
                        class="d-inline-block align-text-center me-2">cookpad</a></div><br>
                <h3 class="card-title">Login</h3><br>
                <form action="/login/user" method="POST">
                    @csrf
                    <div class="input-group flex-nowrap py-2">
                        <label for="email" class="input-group-text" id="addon-wrapping"><i
                                class="bi bi-envelope"></i></label>
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email"
                            aria-describedby="addon-wrapping" value="{{ Session::get('email') }}">
                    </div>
                    <div class="input-group flex-nowrap py-2">
                        <label for="password" class="input-group-text" id="addon-wrapping"><i
                                class="bi bi-lock"></i></label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            aria-label="password" aria-describedby="addon-wrapping">
                    </div>
                    <div class="flex-nowrap py-2 d-flex justify-content-between">
                        <a href="/register" class="btn btn-outline-secondary">Register</a>
                        <button type="submit" name="submit" class="btn btn-warning text-white">Login</button>
                    </div>
                </form>
                @include('komponen.pesan')
            </div>
        </div>
    </div>
</body>
