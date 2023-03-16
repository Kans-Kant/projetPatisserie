<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Menu</h2>
        </div>
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="/public/assets/img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pb-5">
                <h4 class="mb-4 mt-4"><?php echo ($menu['name']) ?></h4>
                <p class="mb-5"><?php echo ($menu['description']) ?></h4>
                </p>
                <div class="menu-category mb-2 mt-2 d-flex">
                    <h5> Category : </h5><a href="/controllers/categoryCtrl.php?idTarget=<?php echo ($menu['category_id']) ?>">
                        <h5 class="ml-3"> <?php echo ($menu['category_name']) ?></h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="reviews">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-review">
                        <form action="" class="p-3 mt-3" method="post">
                            <div class="form-group">
                                <label for="comment">
                                    <h5>Avis/Question ?</h5>
                                </label>
                                <textarea class="form-control" name="review" id="review" placeholder="Commentaire ..." rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">
                                    <h5>Note : </h5>
                                </label>
                                <select name="rating" id="note" class="form-control">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-primary mx-auto">Commenter</button>
                            </div>
                            <?php if (isset($error) && !empty($error)) { ?>
                                <div><small class="text-danger"><?php echo ($error) ?></small></div>
                            <?php } ?>
                        </form>

                        <div class="reviews-section">
                            <?php foreach ($reviews as $review) { ?>
                                <div class="blockquote-box blockquote-info clearfix">
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="rounded-circle reviewer" src="http://standaloneinstaller.com/upload/avatar.png">
                                            <div class="caption">
                                                <small><?php echo ($review['lastname'] . " " . $review['firstname']) ?></small>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <small><?php echo ($review['rating']) ?><i class="fa fa-star" aria-hidden="true"></i></small>
                                            <p>
                                                <?php echo ($review['review']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>