<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Domov</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
</head>

<body class="dark">
    <div id="forest">
        <div class="layer-bg layer" data-type="parallax" data-depth="0.10"></div>
        <div class="layer-1 layer" data-type="parallax" data-depth="0.20"></div>
        <div class="layer-2 layer" data-type="parallax" data-depth="0.50"></div>
        <div class="layer-3 layer" data-type="parallax" data-depth="0.80"></div>
        <div class="layer-overlay layer" data-type="parallax" data-depth="0.85">
            <h1 class="title title-light">Aetheria</h1>
        </div>
        <div class="layer-4 layer" data-type="parallax" data-depth="1.00">
        </div>
        <div class="wrapper-center">
            <div class="floatie">
                <i class="feather-small bi bi-feather floatie-item"></i>
                <i class="feather-big bi bi-feather floatie-item"></i>
                <i class="feather-small bi bi-feather floatie-item"></i>
            </div>
        </div>
        @include('partials.nav')
    </div>

    <div class="alert-box-absolute">
        @include('partials.alerts')
    </div>

    <div id="forest-mobile"></div>

    <div id="content">
        <div class="container">
            <section class="first-section">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                    </div>
                    <div class="col-sm-6">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                    </div>
                </div>
                <div class="row">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo nisi mauris,
                        sed aliquam justo hendrerit a. Etiam neque libero, aliquet eget enim ut, faucibus
                        imperdiet est. Aenean vitae nunc at magna pellentesque iaculis. Suspendisse potenti.
                        Ut ultricies vel lectus iaculis luctus. Etiam faucibus commodo dignissim. Sed mi urna,
                        eleifend id diam in, euismod vestibulum leo. Aliquam ligula ex, tristique ut tortor vel,
                        rhoncus tempor tellus. Fusce tempus turpis non nulla volutpat ultrices. Morbi ultrices
                        sed sem nec pulvinar. Nunc luctus consequat finibus. Ut ac dolor ante. Aliquam pulvinar massa
                        quis ornare aliquam. Sed blandit lectus sed sapien aliquet, vitae rhoncus leo feugiat.
                    </p>
                    <p>
                        In sit amet laoreet nibh. In et ipsum ut quam finibus ornare. Donec placerat scelerisque
                        augue, sed aliquet nibh aliquam vitae. Proin quis ultricies risus. Nunc sollicitudin nisi
                        eget odio scelerisque, ut accumsan dui dapibus. Sed vel dolor a quam posuere ullamcorper sit
                        amet vitae mi. Vestibulum hendrerit auctor lacinia. Quisque pellentesque mollis felis, id
                        congue ex. Donec felis nisi, tristique vel aliquet et, porttitor nec eros. Integer tempus ut
                        velit in posuere.
                    </p>
                    <p>
                        Nullam non diam lacus. Mauris eu ex sed neque blandit dignissim. Morbi porttitor dignissim
                        magna nec pulvinar. Integer gravida at elit quis pharetra. Donec sodales metus et ultricies
                        fermentum. Phasellus hendrerit elementum fringilla. Mauris dui justo, dignissim eget rutrum
                        id, porta ut dolor. Etiam aliquam sem eget ipsum pharetra tristique. Proin congue ex est,
                        sed accumsan turpis pharetra a. Suspendisse interdum, felis non malesuada bibendum, odio
                        justo facilisis metus, quis feugiat eros nisl vel nunc. Mauris molestie malesuada augue,
                        id sollicitudin sem suscipit et. Curabitur sit amet maximus mi, sed lobortis libero.
                        Nam lacus turpis, egestas non gravida sit amet, egestas vel turpis.
                    </p>
                </div>
            </section>
        </div>

        @include('partials.footer')
    </div>

    @include('partials.login')
    @include('partials.edit-profile')

    <script src="../js/form-validation.js"></script>
    <script src="../js/script.js"></script>
</body>
