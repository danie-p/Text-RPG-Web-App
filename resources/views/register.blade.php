<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aetheria | Registrácia</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
</head>
<body class="register-body">
    <div class="register-window">
        <a href="{{ route('home') }}"><div class="close-btn">&times;</div></a>
        <div class="login-form">
            <h2>Registrácia</h2>
            <form class="needs-validation" novalidate action="{{ route('register') }}" method="POST">
            @csrf
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="register-name">Prihlasovacie meno</label>
                    <input name="name" id="register-name" type="text" placeholder="Zadaj prihlasovacie meno" class="bg-dark form-control" required minlength="3" maxlength="20">
                    <div class="invalid-feedback">
                        Zadaj, prosím, meno o dĺžke 3-20 znakov.
                    </div>
                </div>
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="register-email">e-mail</label>
                    <input name="email" id="register-email" type="email" placeholder="Zadaj e-mail" class="bg-dark form-control" required>
                    <div class="invalid-feedback">
                        Zadaj, prosím, e-mail v správnom tvare.
                    </div>
                </div>
                <div class="login-form-el" data-bs-theme="dark">
                    <label for="register-password">Heslo</label>
                    <input name="password" id="register-password" type="password" placeholder="Zadaj heslo" class="bg-dark form-control" required minlength="8">
                    <div class="invalid-feedback">
                        Zadaj, prosím, heslo najmenej o dĺžke 8 znakov.
                    </div>
                </div>
                <div class="login-form-el">
                    <button type="submit" class="btn btn-custom">Registrovať sa</button>
                </div>
            </form>
        </div>
    </div>

    <div class="alert-box-absolute">
        @include('partials.alerts')
    </div>

    <script src="js/form-validation.js"></script>
</body>
</html>
