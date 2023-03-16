<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Ajouter catégorie</h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label>Nom: </label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug: </label>
                <input class="form-control" type="text" name="slug" id="slug">
            </div>
            <div class="form-group">
                <label>Catégorie parent: </label>
                <input class="form-control" type="number" name="parent" id="parent">
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" type="text" name="description" id="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>