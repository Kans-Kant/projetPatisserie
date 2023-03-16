<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Categories</h2>
        </div>
        <a class="btn btn-primary link" href="/controllers/admin/categoryCtrl.php?action=create">Créer categorie</a>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Order</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category["id"] ?></td>
                        <td><?php echo $category["parent_id"] ?></td>
                        <td><?php echo $category["slug"] ?></td>
                        <td><?php echo $category["name"] ?></td>
                        <td><?php echo $category["description"] ?></td>
                        <td><?php echo $category["order"] ?></td>
                        <td><?php echo $category["created_at"] ?></td>
                        <td>
                            <a href="/controllers/admin/categoryCtrl.php?action=edit&idTarget=<?php echo ($category['id']) ?>" class="btn btn-info">Modifier</a>
                            <form action="" method="post">
                                <input type="text" name="category_id" value="<?php echo ($category['id']) ?>" readonly hidden id="">
                                <input type="text" name="action" readonly value="delete" hidden id="">
                                <button class="btn btn-danger delete-item" data-id="<?php echo ($category['id']) ?>"> Supprimer </button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>