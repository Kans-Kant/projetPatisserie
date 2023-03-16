<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Menus</h2>
        </div>
        <a class="btn btn-primary link" href="/controllers/admin/menuCtrl.php?action=create">Ajouter Menu</a>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Prix($)</th>
                    <th scope="col">Description</th>
                    <th scope="col">categorie</th>
                    <th scope="col">image</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu) { ?>
                    <tr>
                        <td><?php echo $menu["id"] ?></td>
                        <td><?php echo $menu["name"] ?></td>
                        <td><?php echo $menu["slug"] ?></td>
                        <td><?php echo $menu["price"] ?></td>
                        <td><?php echo $menu["description"] ?></td>
                        <td><?php echo $menu["category_id"] ?></td>
                        <td><?php echo $menu["cover_img"] ?></td>
                        <td><?php echo $menu["created_at"] ?></td>
                        <td>
                            <a href="/controllers/admin/menuCtrl.php?action=edit&idTarget=<?php echo ($menu['id']) ?>" class="btn btn-info">Modifier</a>
                            <form action="" method="post">
                                <input type="text" name="menu_id" value="<?php echo ($menu['id']) ?>" readonly hidden id="">
                                <input type="text" name="action" readonly value="delete" hidden id="">
                                <button class="btn btn-danger delete-item" data-id="<?php echo ($menu['id']) ?>"> Supprimer </button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>