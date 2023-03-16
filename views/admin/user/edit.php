<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Modifier Utilisateur</h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input class="form-control" type="email" value="<?php echo ($user["email"]) ?>" name="email" id="email" required />
            </div>
            <div class="form-group">
                <label for="lastname">Nom: </label>
                <input type="text" class="form-control" value="<?php echo ($user["lastname"]) ?>" name="lastname" id="lastname" />
            </div>
            <div class="form-group">
                <label for="firstname">Prénom: </label>
                <input type="text" class="form-control" value="<?php echo ($user["firstname"]) ?>" name="firstname" id="firstname" required />
            </div>
            <div class="form-group">
                <label for="phone">Téléphone: </label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo ($user["phone"]) ?>" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe: </label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <div class="form-group">
                <label for="role">Role: </label>
                <select name="role" id="role" class="form-control" value="<?php echo ($user["role"]) ?>">
                    <option value="" disabled="true">Choix du role</option>
                    <option value="1" <?php if ($user['role_id'] == 1) echo "selected"; ?>>Admin / Patissier</option>
                    <option value="2" <?php if ($user['role_id'] == 3) echo "selected"; ?>>Utilisateur</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</div>