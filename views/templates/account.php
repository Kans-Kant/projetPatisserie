<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/controllers/homeCtrl.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Patisserie</span>
    </a>
    <hr>
    <?php if (isset($_SESSION) && isset($_SESSION["role"]) && ($_SESSION["role"] == 1 || $_SESSION["role"] == 2)) { ?>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/controllers/homeCtrl.php" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Accueil
                </a>
            </li>
            <li>
                <a href="/controllers/admin/accountCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a href="/controllers/admin/categoryCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Categories
                </a>
            </li>
            <li>
                <a href="/controllers/admin/menuCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Menus
                </a>
            </li>
            <li>
                <a href="/controllers/admin/userCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Utilisateurs
                </a>
            </li>
            <li>
                <a href="/controllers/admin/roleCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Roles
                </a>
            </li>
            <li>
                <a href="/controllers/admin/reviewCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Commentaires
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Paramètres
                </a>
            </li>
        </ul>
    <?php } else { ?>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/controllers/homeCtrl.php" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Accueil
                </a>
            </li>
            <li>
                <a href="/controllers/user/accountCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a href="/controllers/user/reviewCtrl.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Commentaires
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Paramètres
                </a>
            </li>
        </ul>
    <?php } ?>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>