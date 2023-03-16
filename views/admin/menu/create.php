<div class="container-fluid pt-5">
    <div class="container">
        <?php if (isset($message) && !empty($message)) { ?>
            <div class="alert-success p-3" style="background-color:green; color:white;"><?php echo ($message) ?></div>
        <?php } ?>
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text font-secondary">Ajouter Menu</h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Nom (Titre): </label>
                <input class="form-control" type="text" name="name" id="name" required />
            </div>
            <div class="form-group">
                <label for="slug">Slug: </label>
                <input type="text" class="form-control" name="slug" id="slug" required />
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea type="text" class="form-control" name="description" id="description" rows="7" required> </textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix($): </label>
                <input type="text" class="form-control" name="price" id="price" />
            </div>
            <div class="form-group">
                <label for="cover_img">Image du menu: </label>
                <input type="file" class="form-control" name="cover_img" id="cover_img" required />
            </div>
            <div class="form-group">
                <label for="role">Category: </label>
                <select name="category" id="category" class="form-control">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>