<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Nos croustillons</h2>
            <h1 class="display-4 text-uppercase"><?php echo $categorie['name'] ?></h1>
        </div>
        <div class="row g-5">
            <?php foreach ($categoryMenus as $catMenu) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="cake-item">
                        <div class="position-relative overflow-hidden">
                            <a class="text-white border-bottom" href="/controllers/menuCtrl.php?idTarget=<?php echo $catMenu['id'] ?>">
                                <img class="img-fluid h-150 w-100" src="/public/assets/img/gateau.jpg" alt="">
                            </a>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text"><?php echo ($catMenu['name']) ?></h4>
                            <a class="text-white border-bottom" href="/controllers/menuCtrl.php?idTarget=<?php echo $catMenu['id'] ?>">voir la recette</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>