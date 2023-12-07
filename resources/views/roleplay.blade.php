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

<body class="light">
    <div class="header header-light">
        <h1 class="header-title title title-dark">ROLEPLAY - HRAD</h1>
        <img id="header-img" src="images/header_rp.png" alt="Header">
        <nav id="nav-header" class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-toggler-custom mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item nav-item-custom">
                            <a class="nav-link nav-link-custom active" aria-current="page" href="{{ route('home') }}">
                                <i class="bi bi-house-heart-fill"></i>
                            </a>
                        </li>
                        <li id="drop" class="nav-item nav-item-custom dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Rázcestie
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Les</a></li>
                                <li><a class="dropdown-item" href="{{ route('castle') }}">Hrad</a></li>
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

    <div class="container">
        <div class="first-section">
            <div class="mb-3 name">
                <label for="exampleFormControlInput1" class="form-label">Používateľské meno</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Princezná Fiona">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Príspevok</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tu píš svoj príbeh"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Priložiť súbor</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="input-group mb-3 input-quest">
                <label class="input-group-text" for="inputGroupSelect02">Splenenie questu</label>
                <select class="form-select" id="inputGroupSelect02">
                    <option selected>Nie je vybratý žiadny quest</option>
                    <option value="1">Quest 1</option>
                    <option value="2">Quest 2</option>
                    <option value="3">Quest 3</option>
                </select>
             </div>
            <button type="button" class="btn btn-custom ">Odoslať</button>
        </div>
        <div class="first-section">
            <div class="container rp-header">
                <p>Princezná Fiona</p>
            </div>
            <div class="container rp-text">
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

</body>
</html>
