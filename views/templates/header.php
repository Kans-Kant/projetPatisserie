    <?php

    if (!isset($db)) {

        include '/laragon/www/projetPatisserie/config/db.php';
        $db = Db::getInstance();
    }

    if (!isset($_SESSION)) {
        session_start();
    }

    $sql = "SELECT * FROM categories";
    $categories = $db->select($sql);

    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="stylesheet" href="/public/assets/css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lobster" rel="stylesheet" />
        <title>PROJEt PRO</title>
    </head>

    <body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
            <a href="/controllers/homeCtrl.php" class="navbar-brand d-block d-lg-none">
                <img src="./img/logo.jpg" class="logo">
                <!-- m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i> -->

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-lg-auto py-0">
                    <a href="/controllers/homeCtrl.php" class="nav-item nav-link active">Acceuil</a>
                    <a href="/controllers/aboutCtrl.php" class="nav-item nav-link">A propos</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Recettes</a>
                        <!-- <a href="recettes.html" class="nav-item nav-link">Recettes</a> -->
                        <div class="dropdown-menu m-0">
                            <?php foreach ($categories as $category) { ?>
                                <a href="/controllers/categoryCtrl.php?idTarget=<?php echo ($category['id']) ?>" class="dropdown-item"><?php echo ($category['name']) ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Nous Contacter</a>
                    <div class="nav-item dropdown">
                        <a href="/controllers/connectionCtrl.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mon compte</a>
                        <?php if (isset($_SESSION) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
                            <div class="dropdown-menu m-0">
                                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) { ?>
                                    <a href="/controllers/admin/accountCtrl.php" class="dropdown-item">Mon compte</a>
                                <?php } else { ?>
                                    <a href="/controllers/user/accountCtrl.php" class="dropdown-item">Mon compte</a>
                                <?php } ?>
                                <a href="/controllers/logoutCtrl.php" class="dropdown-item">Déconnexion</a>
                            </div>
                        <?php } else { ?>
                            <div class="dropdown-menu m-0">
                                <a href="/controllers/connectionCtrl.php" class="dropdown-item">Client</a>
                                <a href="/controllers/connectionCtrl.php" class="dropdown-item">Patissier</a>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Page Header Start -->
        <div class="container-fluid bg-dark bg-img p-5 mb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 text-uppercase text-white">Bienvenue chez gâteau Perfect</h1>
                </div>
            </div>
        </div>
        </header>