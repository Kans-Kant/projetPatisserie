<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="main">
            <div class="col-sm-12 col-md-12 well" id="content">
                <div class="container-fluid pt-5">
                    <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                        <h2 class="text font-secondary">Mon compte</h2>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Email: </label>
                            <input class="form-control" type="email" value="<?php echo ($_SESSION["email"]) ?>" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Nom: </label>
                            <input type="text" class="form-control" name="lastname" id="lastname">
                        </div>
                        <div class="form-group">
                            <label>Prénom: </label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Téléphone: </label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>