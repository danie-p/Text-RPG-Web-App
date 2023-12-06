<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aetheria | Hrad</title>
    <link rel="icon" type="image/svg" href="images/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css'); }}">
</head>

<body class="dark">
    <div class="header header-blue">
        <h1 class="header-title title title-light">HRAD</h1>
        <img id="header-img" src="images/header_cropped2.png" alt="Header">
        <nav id="nav-header" class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-toggler-custom mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom active" aria-current="page" href="index2.html">
                                <i class="bi bi-house-heart-fill"></i>
                            </a>
                        </li>
                        <li id="drop" class="nav-item nav-item-custom dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Rázcestie
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Les</a></li>
                                <li><a class="dropdown-item" href="hrad.html">Hrad</a></li>
                                <li><a class="dropdown-item" href="#">Podhradie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom" href="#">Obyvatelia</a>
                        </li>
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom" href="#">Nápoveda</a>
                        </li>
                        <li class="nav-item nav-item-custom nav-item-highlight">
                            <a class="nav-link nav-link-custom nav-link-highlight" href="#">
                                <i class="bi bi-person-heart btn-icon-padding"></i>
                                Prihlásiť sa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                                <a class="nav-link" href="#">Nádvorie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Veža</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Trónna sieň</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="roleplay.html" role="button" class="btn btn-nav-custom">Roleplay</a>
                            <button type="button" class="btn btn-nav-custom">
                                <i class="bi bi-music-note-beamed"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <img src="images/hrad.jpg" alt="Hrad">
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
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <footer class="py-3">
                <div class="container-fluid border-bottom" data-bs-theme="dark">
                    <form class="search-bar d-flex" role="search">
                        <input class="bg-dark form-control me-2" type="search" placeholder="Hľadaný text" aria-label="Search">
                        <button class="btn btn-custom" type="submit">
                            <i class="bi bi-search-heart btn-icon-padding"></i>
                            Hľadaj</button>
                    </form>
                </div>
                <p class="text-center text-light footer-padding">Daniela Pavlíková | 2023</p>
            </footer>
        </div>
    </div>
</body>
</html>
