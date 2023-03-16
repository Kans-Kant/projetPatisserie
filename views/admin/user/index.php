<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Utilisateurs</h2>
        </div>
        <a class="btn btn-primary link" href="/controllers/admin/userCtrl.php?action=create">Ajouter Utilisateur</a>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["lastname"] ?></td>
                        <td><?php echo $user["firstname"] ?></td>
                        <td><?php echo $user["phone"] ?></td>
                        <td><?php echo $user["role_id"] ?></td>
                        <td><?php echo $user["created_at"] ?></td>
                        <td>
                            <a href="/controllers/admin/userCtrl.php?action=edit&idTarget=<?php echo ($user['id']) ?>" class="btn btn-info">Modifier</a>
                            <form action="" method="post">
                                <input type="text" name="user_id" value="<?php echo ($user['id']) ?>" readonly hidden id="">
                                <input type="text" name="action" readonly value="delete" hidden id="">
                                <button class="btn btn-danger delete-item" data-id="<?php echo ($user['id']) ?>"> Supprimer </button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>