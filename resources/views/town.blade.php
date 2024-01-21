<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Podhradie</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../turnjs/lib/turn.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flipbook.css') }}">
</head>

<body class="dark">
    <div class="header header-blue">
        @php
            $lokacia = 'Podhradie';
        @endphp
        <h1 class="header-title title title-light">{{ $lokacia }}</h1>
        <img id="header-img" src="images/header_cropped2.png" alt="Header">
        @include('partials.nav')
    </div>

    <div id="content-subpage">
        <div class="container">
            <div class="first-section">
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-pills nav-custom">
                            <li class="nav-item">
                                <a class="nav-link active nav-active-custom" href="#">Rázcestie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Trh</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Radnica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Námestie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Kováč</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Apotéka</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" role="button" class="btn btn-nav-custom">Roleplay</a>
                            <button type="button" class="btn btn-nav-custom">
                                <i class="bi bi-music-note-beamed"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <img id="img-town" src="images/podhradie.jpg" alt="Podhradie">
                        <p>
                            Nullam non diam lacus. Mauris eu ex sed neque blandit dignissim. Morbi porttitor dignissim
                            magna nec pulvinar. Integer gravida at elit quis pharetra. Donec sodales metus et ultricies
                            fermentum. Phasellus hendrerit elementum fringilla. Mauris dui justo, dignissim eget rutrum
                            id, porta ut dolor. Etiam aliquam sem eget ipsum pharetra tristique. Proin congue ex est,
                            sed accumsan turpis pharetra a. Suspendisse interdum, felis non malesuada bibendum, odio
                            justo facilisis metus, quis feugiat eros nisl vel nunc. Mauris molestie malesuada augue,
                            id sollicitudin sem suscipit et. Curabitur sit amet maximus mi, sed lobortis libero.
                            Nam lacus turpis, egestas non gravida sit amet.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo nisi mauris,
                            sed aliquam justo hendrerit a. Etiam neque libero, aliquet eget enim ut, faucibus
                            imperdiet est. Aenean vitae nunc at magna pellentesque iaculis. Suspendisse potenti.
                            Ut ultricies vel lectus iaculis luctus. Etiam faucibus commodo dignissim. Sed mi urna,
                            eleifend id diam in, euismod vestibulum leo. Aliquam ligula ex, tristique ut tortor vel,
                            rhoncus tempor tellus. Fusce tempus turpis non nulla volutpat ultrices. Morbi ultrices
                            sed sem nec pulvinar. Nunc luctus consequat finibus. Ut ac dolor ante. Aliquam pulvinar massa
                            quis ornare aliquam. Sed blandit lectus sed sapien aliquet, vitae rhoncus leo feugiat.
                            In sit amet laoreet nibh.
                        </p>
                        <p>
                            In et ipsum ut quam finibus ornare. Donec placerat scelerisque
                            augue, sed aliquet nibh aliquam vitae. Proin quis ultricies risus. Nunc sollicitudin nisi
                            eget odio scelerisque, ut accumsan dui dapibus. Sed vel dolor a quam posuere ullamcorper sit
                            amet vitae mi. Vestibulum hendrerit auctor lacinia. Quisque pellentesque mollis felis, id
                            congue ex. Donec felis nisi, tristique vel aliquet et, porttitor nec eros. Integer tempus ut
                            velit in posuere.
                        </p>
                    </div>
                </div>
            </div>

            @php($quote = 'Per ardua at astra, hoc genus omne, multis e gentibus vires.')
            @include('partials.flipbook')
        </div>

        <div class="alert-box-sticky">
            @include('partials.alerts')
        </div>
        @include('partials.footer')
    </div>

    @include('partials.login')
    @include('partials.edit-profile')

    <script src="../js/flipbook.js" type="text/javascript"></script>
    <script src="../js/form-validation.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
