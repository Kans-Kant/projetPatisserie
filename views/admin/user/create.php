<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Ajouter Utilisateur</h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input class="form-control" type="email" name="email" id="email" required />
            </div>
            <div class="form-group">
                <label for="lastname">Nom: </label>
                <input type="text" class="form-control" name="lastname" id="lastname" />
            </div>
            <div class="form-group">
                <label for="firstname">Prénom: </label>
                <input type="text" class="form-control" name="firstname" id="firstname" required />
            </div>
            <div class="form-group">
                <label for="phone">Téléphone: </label>
                <input type="text" class="form-control" name="phone" id="phone" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe: </label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <div class="form-group">
                <label for="role">Role: </label>
                <select name="role" id="role" class="form-control">
                    <option value="3">Utilisateur</option>
                    <option value="1">Admin(Patissier)</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>