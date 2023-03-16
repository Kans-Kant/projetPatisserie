<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Commentaires</h2>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Note</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review) { ?>
                    <tr>
                        <td><?php echo $review["id"] ?></td>
                        <td><?php echo $review["review"] ?></td>
                        <td><?php echo $review["rating"] ?></td>
                        <td><a href="/controllers/menuCtrl.php?idTarget=<?php echo $review["menu_id"] ?>" class="btn btn-primary">Voir le Menu</a></td>
                        <td><?php echo $review["created_at"] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="text" name="review_id" value="<?php echo ($review['id']) ?>" readonly hidden id="">
                                <input type="text" name="action" readonly value="delete" hidden id="">
                                <button class="btn btn-danger delete-item" data-id="<?php echo ($review['id']) ?>"> Supprimer </button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>