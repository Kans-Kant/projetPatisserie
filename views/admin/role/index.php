<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Roles</h2>
        </div>
        <a class="btn btn-primary link" href="/controllers/admin/roleCtrl.php?action=create">Ajouter Role</a>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Nom affichage</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role) { ?>
                    <tr>
                        <td><?php echo $role["id"] ?></td>
                        <td><?php echo $role["name"] ?></td>
                        <td><?php echo $role["display_name"] ?></td>
                        <td><?php echo $role["created_at"] ?></td>
                        <td>
                            <a href="/controllers/admin/roleCtrl.php?action=edit&idTarget=<?php echo ($role['id']) ?>" class="btn btn-info">Modifier</a>
                            <button class="btn btn-danger"> Supprimer </button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>