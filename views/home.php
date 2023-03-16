<!------------------------------------About End------------------------------->

<!----------------------------------------- Products Start---------------------------->
<div class="container-fluid about py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Nos Recettes</h2>
            <h1 class="display-4 text-uppercase">DÉCOUVREZ NOS GÂTEAUX</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                <?php foreach ($categories as $key => $category) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white <?php if ($key == 467) {
                                                            echo "category active";
                                                        } else {
                                                            echo "category1";
                                                        } ?>" data-bs-toggle="pill" href="#tab-<?php echo $category['id'] ?>"><?php echo ($category['name']) ?></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php foreach ($groupedCatMenus as $key => $categoryMenus) { ?>
                    <div id="tab-<?php echo "$key" ?>" class="tab-pane fade show <?php if ($key == "467") {
                                                                                        echo "active";
                                                                                    } ?>  p-0">
                        <div class="row g-3">
                            <?php foreach ($categoryMenus as $menu) { ?>
                                <div class="col-lg-6">
                                    <div class="d-flex h-110">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid" src="/public/assets/img/gateau.jpg" alt="" style="width: 150px; height: 110px;">
                                            <h4 class="bg-dark text p-2 m-0"><?php echo ($key) ?></h4>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4 w-100">
                                            <h5 class="text-uppercase"> <?php echo ($menu['name']) ?></h5>
                                            <span><?php echo ($menu['description']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="btn btn-primary p-2 mt-3" href="/controllers/categoryCtrl.php?idTarget=<?php echo ($key) ?>"> Voir Plus</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>